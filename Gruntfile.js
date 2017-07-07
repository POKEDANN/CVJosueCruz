module.exports = function(grunt) {
    grunt.loadNpmTasks('grunt-contrib-uglify');

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        uglify: {
            dist: {
                options: {
                    preserveComments: /^!/,
                    output: { 
                        comments: 'all'
                    },
                    compress: false,
                    mangle : false
                },
                files: {
                    'public/js/app.js': [
                        'libraries/jquery-1.12.4.js',
                        'libraries/jquery.filterizr.js',
                        'libraries/images-loaded-4.1.3.js',
                        'libraries/parallax.js-1.4.2/parallax.js',
                        'libraries/lightbox.js',
                        'libraries/jquery.simple-text-rotator.js',
                        'libraries/typed.js',
                        'libraries/jquery.scrollTo.js',
                        'src/js/danielcv.js'
                    ]
                }
            }
        }        
    });

    grunt.registerTask('default', [
        'uglify:dist'
    ]);
}