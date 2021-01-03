/*
npm install gulp gulp-sass gulp-sass-glob gulp-sourcemaps gulp-autoprefixer gulp-rename gulp-uglify uglify-save-license gulp-notify gulp-if browserify vinyl-ftp --save-dev
*/

'use strict';

// ===============================
// # PATHS & SETTINGS
// ===============================

const
    PATH_ASSETS = './assets/',
    PATH_ASSETS_STYLES = PATH_ASSETS + 'scss/',
    PATH_ASSETS_SCRIPTS = PATH_ASSETS + 'js/',
    PATH_ASSETS_DEST = {
        "scss": "./css/",
        "js": "./js/"
    },
    PATH_IMAGES = './img/',
    PATH_FONTS = './fonts/',
    PATH_FILES = './',

    PRODUCTION = true,
    MINIFY = true,
    MINIFY_SUFFIX = '.min',

    AUTOPREFIXER_BROWSERS = ["> 5%", "Safari >= 8", "Explorer >= 10"],

    WATCH = {
        "scss": PATH_ASSETS_STYLES + "**/*.{scss,css}",
        "scss_2": "./template/block/**/*.{scss,css}",
        "scss_p1": [
            PATH_ASSETS_STYLES + "style.scss",
            PATH_ASSETS_STYLES + "style-admin.scss",
        ],
        "scss_p2": [
            PATH_ASSETS_STYLES + "style2.scss",
            PATH_ASSETS_STYLES + "style2-admin.scss",
        ],
        "scss_p3": [
            PATH_ASSETS_STYLES + "style3.scss",
            PATH_ASSETS_STYLES + "style3-admin.scss",
        ],
        "js": PATH_ASSETS_SCRIPTS + "**/*.js",
        "files": [
            PATH_FILES + "**/*",
            "!" + PATH_ASSETS + "**/*",
            "!" + PATH_IMAGES + "**/*",
            "!" + PATH_FONTS + "**/*",
            "!./node_modules/**/*",
            "!./gulpfile.js",
            "!./gulp-deploy.json",
            "!./gulp-deploy-example.json",
            "!./package.json",
            "!./package-lock.json",
            "!LICENSE"
        ],
    };


// ===============================
// # GULP
// ===============================

const
    gulp = require('gulp'),
    sass = require('gulp-sass'),
    sassGlob = require('gulp-sass-glob'),
    sourcemaps = require('gulp-sourcemaps'),
    autoprefixer = require('gulp-autoprefixer'),
    rename = require('gulp-rename'),
    uglify = require('gulp-uglify'),
    saveLicense = require('uglify-save-license'),
    notify = require('gulp-notify'),
    gulpif = require('gulp-if'),
    browserify = require('gulp-browserify');

// ===============================
// # FUNCTIONS
// ===============================

function taskCSS(src, dest) {
    var output;
    if (MINIFY) {
        output = 'compressed';
    } else {
        output = 'expanded';
    }
    return gulp.src(src)
        .pipe(gulpif(!PRODUCTION, sourcemaps.init({loadMaps: true})))
        .pipe(rename({suffix: MINIFY_SUFFIX}))
        .pipe(sassGlob())
        .pipe(sass({outputStyle: output}).on('error', sass.logError))
        .pipe(autoprefixer({browsers: AUTOPREFIXER_BROWSERS}))
        .pipe(gulpif(!PRODUCTION, sourcemaps.write()))
        .pipe(gulp.dest(dest))
        .pipe(notify({
            onLast: false,
            message: "SCSS - <%= file.relative %>"
        }));
}

function taskJs(src, dest) {
    /*return gulp.src(src)
        .pipe(gulpif(!PRODUCTION, sourcemaps.init({loadMaps: true})))
        .pipe(rename({suffix: MINIFY_SUFFIX}))
        .pipe(gulpif(MINIFY, uglify({output: {comments: saveLicense}})))
        .pipe(gulpif(!PRODUCTION, sourcemaps.write()))
        .pipe(gulp.dest(dest))
        .pipe(notify({
            onLast: true,
            message: "JS - <%= file.relative %>"
        }));*/
    return gulp.src([PATH_ASSETS_SCRIPTS + 'scripts.js', PATH_ASSETS_SCRIPTS + 'scripts-admin.js'])
        .pipe(gulpif(!PRODUCTION, sourcemaps.init({loadMaps: true})))
        .pipe(rename({suffix: MINIFY_SUFFIX}))
        .pipe(browserify())
        //.pipe(babel({presets: ['es2015']}))
        .pipe(gulpif(MINIFY, uglify({output: {comments: saveLicense}})))
        .pipe(gulpif(!PRODUCTION, sourcemaps.write()))
        .pipe(gulp.dest(dest))
        .pipe(notify({
            onLast: false,
            message: "JS - <%= file.relative %>"
        }));
}

// ===============================
// #  COMPILE
// ===============================

gulp.task('compile:all_1', ['compile:scss_1', 'compile:js']);
gulp.task('compile:all_2', ['compile:scss_2', 'compile:js']);
gulp.task('compile:all_3', ['compile:scss_3', 'compile:js']);

gulp.task('compile:scss_1', function () {
    return taskCSS(WATCH.scss_p1, PATH_ASSETS_DEST.scss);
});

gulp.task('compile:scss_2', function () {
    return taskCSS(WATCH.scss_p2, PATH_ASSETS_DEST.scss);
});

gulp.task('compile:scss_3', function () {
    return taskCSS(WATCH.scss_p3, PATH_ASSETS_DEST.scss);
});

gulp.task('compile:js', function () {
    return taskJs(WATCH.js, PATH_ASSETS_DEST.js);
});

// ===============================
// # WATCHER
// ===============================

gulp.task('watch:all_1', ['watch:scss_1', 'watch:js']);
gulp.task('watch:all_2', ['watch:scss_2', 'watch:js']);
gulp.task('watch:all_3', ['watch:scss_3', 'watch:js']);

gulp.task('watch:scss_1', function () {
    gulp.watch(WATCH.scss, ['compile:scss_1']);
    gulp.watch(WATCH.scss_2, ['compile:scss_1']);
});

gulp.task('watch:scss_2', function () {
    gulp.watch(WATCH.scss, ['compile:scss_2']);
    gulp.watch(WATCH.scss_2, ['compile:scss_2']);
});

gulp.task('watch:scss_3', function () {
    gulp.watch(WATCH.scss, ['compile:scss_3']);
    gulp.watch(WATCH.scss_2, ['compile:scss_3']);
});

gulp.task('watch:js', function () {
    gulp.watch(WATCH.js, ['compile:js']);
});