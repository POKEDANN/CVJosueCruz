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
                        'libraries/jquery-1.12.4.js'
                    ]
                }
            }
        }        
    });

    grunt.registerTask('default', [
        'uglify:dist'
    ]);
}