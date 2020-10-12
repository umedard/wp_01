import gulp from "gulp";
import sass from "gulp-sass";
import cleanCSS from "gulp-clean-css";
import imagemin from "gulp-imagemin";
import browserSync from "browser-sync";
import concat from "gulp-concat";
import babel from "gulp-babel";

const sassOptions = { outputStyle: "expanded", errLogToConsole: true };

exports.sass = () =>
  gulp
    .src("./src/scss/styles.scss")
    .pipe(sass(sassOptions))
    .pipe(gulp.dest("./dist/css"))
    .pipe(browserSync.reload({ stream: true }));

exports.sassEditor = () =>
  gulp
    .src("./src/scss/blocks/style-editor.scss")
    .pipe(sass(sassOptions))
    .pipe(gulp.dest("./"))
    .pipe(browserSync.reload({ stream: true }));

exports.images = () =>
  gulp
    .src("./src/images/**/*")
    .pipe(imagemin())
    .pipe(gulp.dest("./dist/images"))
    .pipe(browserSync.reload({ stream: true }));

exports.minifycss = () =>
  gulp
    .src("./dist/styles.css")
    .pipe(cleanCSS({ compatibility: "ie8", level: 2 }))
    .pipe(gulp.dest("dist"));

exports.packjs = () =>
  gulp
    .src("./src/js/*.js")
    .pipe(
      babel({
        presets: [
          [
            "@babel/preset-env",
            {
              targets: {
                chrome: "58",
                ie: "11",
              },
            },
          ],
        ],
      })
    )
    .pipe(concat("bundle.js"))
    .pipe(gulp.dest("./dist/js"));

gulp.task("serve", () => {
  gulp.watch("./src/scss/**/*", gulp.series("sass"));
  gulp.watch("./src/scss/**/*", gulp.series("sassEditor"));
  gulp.watch("./src/images/**/*", gulp.series("images"));
  gulp.watch("./src/js/*.js", gulp.series("packjs"));
});

gulp.task("default", gulp.series("serve"));
