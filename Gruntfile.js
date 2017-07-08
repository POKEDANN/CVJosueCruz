module.exports = function(grunt) {
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-concat');

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        uglify: {
            dist: {
                options: {
                    preserveComments: '/^!+/',
                    compress: false,
                    mangle : false
                },
                files: {
                    'tmp-js/jquery-1.12.4.min.js': 'libraries/jquery-1.12.4.js',
                    'tmp-js/jquery.filterizr.min.js': 'libraries/jquery.filterizr.js',
                    'tmp-js/images-loaded-4.1.3.min.js': 'libraries/images-loaded-4.1.3.js',
                    'tmp-js/lightbox.min.js': 'libraries/lightbox.js',
                    'tmp-js/jquery.simple-text-rotator.min.js': 'libraries/jquery.simple-text-rotator.js',
                    'tmp-js/typed.min.js': 'libraries/typed.js',
                    'tmp-js/jquery.scrollTo.min.js': 'libraries/jquery.scrollTo.js',
                    'tmp-js/bootstrap.min.js': 'libraries/bootstrap.js',
                    'tmp-js/parallax.min.js': 'libraries/parallax.js-1.4.2/parallax.js',
                    'tmp-js/danielcv.min.js': 'src/js/danielcv.js'
                }
            }
        },

        concat: {
            js: {
                files: {
                    'public/js/app.js': [
                        'tmp-js/jquery-1.12.4.min.js',
                        'tmp-js/jquery.filterizr.min.js',
                        'tmp-js/images-loaded-4.1.3.min.js',
                        'tmp-js/lightbox.min.js',
                        'tmp-js/jquery.simple-text-rotator.min.js',
                        'tmp-js/typed.min.js',
                        'tmp-js/jquery.scrollTo.min.js',
                        'tmp-js/bootstrap.min.js',
                        'libraries/jquery.circliful.min.js',
                        'tmp-js/parallax.min.js',
                        'libraries/sweetalert.min.js',
                        'tmp-js/danielcv.min.js'
                    ]
                }
            }
        }
    });

    grunt.registerTask('default', [
        'uglify:dist',
        'concat:js'
    ]);
}