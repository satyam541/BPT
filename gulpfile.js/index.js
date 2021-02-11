const gulp = require('gulp');
const less = require('gulp-less');
const cleanCss = require('gulp-clean-css');
const gulpRename = require('gulp-rename');
//const watchLess = require('gulp-watch-less');
//const rename = require('rename');
//const debug = require('gulp-debug');
//const lessChanged = require('gulp-less-changed');

const OutputPath = 'public/style/';
const MinifiedExtension = '.min.css';


 function lessCompile() {
  // body omitted
  return gulp.src('public/style/less/main.less')
        .pipe(less())    // convert to css
		.pipe(gulp.dest(OutputPath))
        .pipe(cleanCss())
        .pipe(gulpRename({ extname: MinifiedExtension }))
        .pipe(gulp.dest(OutputPath));
}

function watchstyle()
{
    //"src/style/less/*.less",
	return gulp.watch("public/style/less/**/*.less",{ ignoreInitial: false },lessCompile);
}

exports.myless = lessCompile;
exports.run_my_less = watchstyle;
