const argv = require('yargs').argv;
const assert = require('assert');
const del = require('del');
const download = require('download');
const fs = require('fs');
const mkdirp = require('mkdirp');
const path = require('path');
const yauzl = require('yauzl');

function extract(archive, dest) {
    return new Promise((fulfill, reject) => {
        yauzl.open(archive, {lazyEntries: true}, (err, zipFile) => {
            if (err) {
                reject(err);
            }

            zipFile.readEntry();

            zipFile.on('end', () => {
                fulfill();
            });

            zipFile.on('entry', (entry) => {
                const targetFileName = path.join(dest, entry.fileName);

                if (/\/$/.test(entry.fileName)) {
                    mkdirp(targetFileName, (err) => {
                        if (err) {
                            reject(err);
                        }
                    });
                } else {
                    mkdirp(path.dirname(targetFileName), (err) => {
                        if (err) {
                            reject(err);
                        }

                        zipFile.openReadStream(entry, (err, contents) => {
                            if (err) {
                                reject(err);
                            }

                            contents.pipe(fs.createWriteStream(targetFileName));
                            contents.on('end', () => {
                                zipFile.readEntry();
                            });
                        });
                    });
                }
            });
        });
    });
}

const url = argv['release-archive'];
const archive = 'tmp/' + path.basename(url);

console.info('Validating arguments');
assert.ok(typeof url === 'string', 'You must supply a --release-archive');

console.info('Downloading', url, 'to', archive);
download(argv['release-archive'], 'tmp').then(() => {
    console.info('Extracting archive');
    extract(archive, 'libraries').then(() => {
        console.warn('Skipping concatenation, I don\'t know how yet');

        console.info('Clearing up temporary files');
        del('tmp');
    });
});
