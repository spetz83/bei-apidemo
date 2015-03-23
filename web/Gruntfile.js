/**
 * Created by tom.etzel on 3/18/2015.
 */
module.exports = function(grunt) {
    require('load-grunt-tasks')(grunt);

    var theme_name = 'styles';
    var base_theme_path = 'public';
    var bower_path = 'bower_components';

    var global_vars = {
        theme_name: theme_name,
        theme_css: base_theme_path + '/css',
        theme_scss: base_theme_path + '/css/scss',
        theme_js: base_theme_path + '/js',
        base_theme_path: base_theme_path,
        bower_path: bower_path
    };

    //var bourbon = require('node-bourbon').includePaths;

    // array of javascript libraries to include.
    /*var jsLibs = [
        '<%= global_vars.base_theme_path %>/js/vendor/placeholder.js',
        '<%= global_vars.base_theme_path %>/js/vendor/fastclick.js',
        'js/vendor/slick/slick.min.js'
    ];*/

    var bootstrapLibs = [
      '<%= global_vars.bower_path %>/bootstrap-sass/vendor/assets/javascripts/bootstrap/transition.js',
        '<%= global_vars.bower_path %>/bootstrap-sass/vendor/assets/javascripts/bootstrap/alert.js',
        '<%= global_vars.bower_path %>/bootstrap-sass/vendor/assets/javascripts/bootstrap/buttons.js',
        '<%= global_vars.bower_path %>/bootstrap-sass/vendor/assets/javascripts/bootstrap/carousel.js',
        '<%= global_vars.bower_path %>/bootstrap-sass/vendor/assets/javascripts/bootstrap/collapse.js',
        '<%= global_vars.bower_path %>/bootstrap-sass/vendor/assets/javascripts/bootstrap/dropdown.js',
        '<%= global_vars.bower_path %>/bootstrap-sass/vendor/assets/javascripts/bootstrap/modal.js',
        '<%= global_vars.bower_path %>/bootstrap-sass/vendor/assets/javascripts/bootstrap/tooltip.js',
        '<%= global_vars.bower_path %>/bootstrap-sass/vendor/assets/javascripts/bootstrap/popover.js',
        '<%= global_vars.bower_path %>/bootstrap-sass/vendor/assets/javascripts/bootstrap/scrollspy.js',
        '<%= global_vars.bower_path %>/bootstrap-sass/vendor/assets/javascripts/bootstrap/tab.js',
        '<%= global_vars.bower_path %>/bootstrap-sass/vendor/assets/javascripts/bootstrap/affix.js'
    ];

    // array of foundation javascript components to include.
    /*var jsFoundation = [
        '<%= global_vars.base_theme_path %>/js/foundation/foundation.js',
        '<%= global_vars.base_theme_path %>/js/foundation/foundation.abide.js',
        '<%= global_vars.base_theme_path %>/js/foundation/foundation.accordion.js',
        '<%= global_vars.base_theme_path %>/js/foundation/foundation.alert.js',
        '<%= global_vars.base_theme_path %>/js/foundation/foundation.clearing.js',
        '<%= global_vars.base_theme_path %>/js/foundation/foundation.dropdown.js',
        '<%= global_vars.base_theme_path %>/js/foundation/foundation.equalizer.js',
        '<%= global_vars.base_theme_path %>/js/foundation/foundation.interchange.js',
        '<%= global_vars.base_theme_path %>/js/foundation/foundation.joyride.js',
        '<%= global_vars.base_theme_path %>/js/foundation/foundation.magellan.js',
        '<%= global_vars.base_theme_path %>/js/foundation/foundation.offcanvas.js',
        '<%= global_vars.base_theme_path %>/js/foundation/foundation.orbit.js',
        '<%= global_vars.base_theme_path %>/js/foundation/foundation.reveal.js',
        '<%= global_vars.base_theme_path %>/js/foundation/foundation.slider.js',
        '<%= global_vars.base_theme_path %>/js/foundation/foundation.tab.js',
        '<%= global_vars.base_theme_path %>/js/foundation/foundation.tooltip.js',
        '<%= global_vars.base_theme_path %>/js/foundation/foundation.topbar.js'
    ];*/

    // array of custom javascript files to include.
    var jsApp = [
        '<%= global_vars.base_theme_path %>/js/_*.js'
    ];

    grunt.initConfig({
        global_vars: global_vars,
        pkg: grunt.file.readJSON('package.json'),

        sass: {
            prod: {
                options: {
                    outputStyle: 'compressed',
                    includePaths: ['<%= global_vars.theme_scss %>/', '<% global_vars.bower_path %>/bootstrap-sass/assets/stylesheets/']
                },
                files: {
                    '<%= global_vars.theme_css %>/<%= global_vars.theme_name %>.css': '<%= global_vars.theme_scss %>/<%= global_vars.theme_name %>.scss'
                }
            },
            dev: {
                options: {
                    outputStyle: 'extended',
                    includePaths: ['<%= global_vars.theme_scss %>/', '<% global_vars.bower_path %>/bootstrap-sass/assets/stylesheets/']
                },
                files: {
                    '<%= global_vars.theme_css %>/<%= global_vars.theme_name %>.css': '<%= global_vars.theme_scss %>/<%= global_vars.theme_name %>.scss'
                }
            }
        },


        /*jshint: {
            options: {
                jshintrc: '.jshintrc'
            },
            all: [
                'Gruntfile.js',
                jsApp
            ]
        },*/

        uglify: {
            options: {
                sourceMap: false,
                mangle: false
            },
            prod: {
                files: {
                    '<%= global_vars.theme_js %>/bootstrap.min.js': [bootstrapLibs]
                }
            },
            dev: {
                options: {
                    compress: false,
                    beautify: true,
                    preserveComments: 'all'
                },
                files: {
                    '<%= global_vars.theme_js %>/bootstrap.min.js': [bootstrapLibs]
                }
            }
        },

        watch: {
            grunt: { files: ['Gruntfile.js'] },

            sass: {
                files: '<%= global_vars.theme_scss %>/**/*.scss',
                tasks: ['sass:dev'],
                options: {
                    //livereload: true
                }
            }

            /*js: {
                files: [
                    jsLibs,
                    jsFoundation,
                    '<%= jshint.all %>'
                ],
                tasks: ['jshint', 'uglify']
            }*/
        }
    });
    grunt.registerTask('prod', ['sass:prod', 'uglify:prod']);
    grunt.registerTask('dev', ['sass:dev','uglify:dev', 'watch']);
    //grunt.registerTask('build', ['jshint','uglify','sass']);
    grunt.registerTask('default', ['dev']);
};