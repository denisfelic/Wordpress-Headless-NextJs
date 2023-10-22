const fs = require('fs')
const path = require('path')


const RenameDir = ({ folderName, newFolderName }) => {
  // directory paths
  const oldDirName = path.join(__dirname, '..', folderName)
  const newDirName = path.join(__dirname, '..', newFolderName)
  // rename the directory
  fs.rename(oldDirName, newDirName, err => {
    if (err) {
      throw err
    }

  })


}

module.exports = RenameDir;