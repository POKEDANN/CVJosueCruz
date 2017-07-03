module.exports = function(grunt) {
    grunt.loadNpmTasks('grunt-contrib-uglify');

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        uglify: {
            dist: {
                options: {
                    preserveComments: '/^!/',
                    compress: true,
                    mangle : true,
                },
                files: {
                    'public/js/app.js': [
                        'libraries/jquery-1.12.4.js',
                        'libraries/jquery.filterizr.js',
                        'libraries/images-loaded-4.1.3.js'
                    ]
                }
            }
        }        
    });

    grunt.registerTask('default', [
        'uglify:dist'
    ]);
}