module.exports = function( grunt ) {

	var pkg = grunt.file.readJSON( 'package.json' );

	console.log( pkg.title + ' - ' + pkg.version );

	// Set files to include/exclude in a release.
	var distFiles = [
		'**',
		'!build/**',
		'!node_modules/**',
		'!.editorconfig',
		'!.gitignore',
		'!.jshintrc',
		'!gruntfile.js',
		'!package.json',
		'!**/*~'
	];

	grunt.initConfig( {

		pkg: pkg,

		// Set folder variables.
		dirs: {
			css: 'assets/css',
			js: 'assets/js'
		},
 
		clean: {
			build: [ 'build' ]
		},

		// Build the plugin zip file and place in build folder.
		compress: {
			main: {
				options: {
					mode: 'zip',
					archive: './build/plugin-name-<%= pkg.version %>.zip'
				},
				expand: true,
				src: distFiles,
				dest: '/plugin-name'
			}
		},

		// 'main' task is for distributing build files.
		copy: {
			main: {
				expand: true,
				src: distFiles,
				dest: 'build/plugin-name'
			}
		}
	} );

	require( 'load-grunt-tasks' )( grunt );

	grunt.registerTask( 'build', [ 'clean:build', 'copy:main', 'compress' ] );

	grunt.util.linefeed = '\n';
};
