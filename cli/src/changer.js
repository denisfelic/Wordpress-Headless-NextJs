const replace = require('replace-in-file');

const Changer = ({ files, from, to }) => {
  const patternToFind = new RegExp(from.toString(), "g")

  find_replace({
    files: files,
    from: patternToFind,
    to: to,
  });
}

function find_replace({ files, from, to, }) {

  replace({ files, from, to, }).then(results => {
  })
    .catch(error => {
      console.error('Error occurred:', error);
    });
}

module.exports = Changer