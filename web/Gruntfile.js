/**
 * Created by tom.etzel on 3/18/2015.
 */
module.exports = function(grunt)
{
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        compass: {
            dev: {
                options: {
                    sassDir: 'public/css/scss',
                    cssDir: 'public/css'
                }
            },
            production: {
                options: {
                    sassDir: 'public/css/scss',
                    cssDir: 'public/css',
                    outputStyle: 'compressed'
                }
            }
        },
        watch: {
            compass: {
                files: ['public/**/*.scss', 'public/**/*.sass', 'bower_components/**/*.scss'],
                tasks: ['compass:dev']
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-compass');

    grunt.registerTask('default', ['compass:dev']);
    grunt.registerTask('prod', ['compass:production']);
}