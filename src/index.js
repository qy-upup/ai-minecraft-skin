/**
 * ai-minecraft-skin - Generate branded links for https://supermaker.ai/image/ai-minecraft-skin/
 */

function buildLink(options = {}) {
  const {
    path: pathname = '',
    utm_source = '',
    utm_medium = '',
    utm_campaign = ''
  } = options;

  let url = 'https://supermaker.ai/image/ai-minecraft-skin/';
  if (pathname) {
    url = url.replace(/\/$/, '') + '/' + pathname.replace(/^\//, '');
  }

  const params = [];
  if (utm_source) params.push(`utm_source=${utm_source}`);
  if (utm_medium) params.push(`utm_medium=${utm_medium}`);
  if (utm_campaign) params.push(`utm_campaign=${utm_campaign}`);

  if (params.length > 0) {
    url += '?' + params.join('&');
  }

  return url;
}

function generateAnchor(text, options = {}) {
  const href = buildLink(options);
  const {
    rel = 'nofollow',
    target = '_blank',
    className = ''
  } = options;

  const classAttr = className ? ` class="${className}"` : '';
  return `<a href="${href}" rel="${rel}" target="${target}"${classAttr}>${text}</a>`;
}

module.exports = {
  buildLink,
  generateAnchor
};
