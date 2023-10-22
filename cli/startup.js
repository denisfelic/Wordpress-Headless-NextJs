const fs = require('fs');
const path = require('path');

const Changer = require('./src/changer');
const RenameDir = require('./src/renameDir');

try {
  const data = fs.readFileSync(path.join('..', 'theme.json'))
  const userThemeOptions = JSON.parse(data);

  if (userThemeOptions.build.toString() !== '0') {
    console.log('already build')
    return;
  }

  const config = {
    theme_name: userThemeOptions.name,
    theme_slug: userThemeOptions.slug,
  }

  const default_theme_options = {
    theme_folder_name: 'default_theme',
    theme_docker_name: 'default_theme',
    theme_name: '<Default-Theme-Name>'
  }

  // rename theme folder
  RenameDir({
    folderName: "/../" + default_theme_options.theme_folder_name,
    newFolderName: "../" + config.theme_slug
  });

  // rename theme name in docker
  Changer({
    files: `../docker-compose.yml`,
    from: default_theme_options.theme_docker_name,
    to: config.theme_slug,
  });

  // Change .gitignore
  Changer({
    files: `../.gitignore`,
    from: default_theme_options.theme_folder_name,
    to: config.theme_slug,
  });

  // change .env
  Changer({
    files: `../.env`,
    from: default_theme_options.theme_folder_name,
    to: config.theme_slug,
  });

  // rename theme name inside theme folders
  Changer({
    files: `../${config.theme_slug}/**/*.{php,js,json,txt}`,
    from: default_theme_options.theme_folder_name,
    to: config.theme_slug,
  });

  // rename theme name inside theme folders
  Changer({
    files: `../${config.theme_slug}/**/*.{scss,css}`,
    from: default_theme_options.theme_name,
    to: config.theme_name,
  });

  // change Makefile
  Changer({
    files: `../Makefile`,
    from: default_theme_options.theme_folder_name,
    to: config.theme_slug,
  });

  // change Makefile
  Changer({
    files: `../README.md`,
    from: default_theme_options.theme_folder_name,
    to: config.theme_slug,
  });

  // rename theme name inside theme folders
  Changer({
    files: `../database.sql`,
    from: default_theme_options.theme_name,
    to: config.theme_name,
  });

  Changer({
    files: `../database.sql`,
    from: default_theme_options.theme_folder_name,
    to: config.theme_slug,
  });

} catch (error) {
  console.error(error)
}
