# ai-minecraft-skin

A lightweight, zero-dependency utility library for managing and generating dynamic links with advanced tracking capabilities.

## Features

- **Simple API** - Easy-to-use functions for link generation
- **UTM Parameters** - Built-in support for utm_source, utm_medium, utm_campaign
- **HTML Generation** - Generate properly formatted anchor tags with custom attributes
- **Zero Dependencies** - No external dependencies required
- **Type Safe** - Full TypeScript support
- **Production Ready** - Used in production environments

## Installation

```bash
npm install ai-minecraft-skin
```

## Quick Start

```javascript
const { buildLink, generateAnchor } = require('ai-minecraft-skin');

// Create a tracked link with UTM parameters
const link = buildLink({
  path: 'blog/getting-started',
  utm_source: 'newsletter',
  utm_medium: 'email',
  utm_campaign: 'q1-2025'
});

// Generate HTML anchor tag
const html = generateAnchor('Read the guide', {
  path: 'blog/getting-started',
  utm_source: 'newsletter',
  utm_medium: 'email',
  className: 'btn btn-primary'
});

console.log(link);
// Output: https://example.com/blog/getting-started?utm_source=newsletter&utm_medium=email&utm_campaign=q1-2025

console.log(html);
// Output: <a href="..." rel="nofollow" target="_blank" class="btn btn-primary">Read the guide</a>
```

## Use Cases

Perfect for:
- Marketing analytics and campaign tracking
- Dynamic link generation in email templates
- Building referral and affiliate systems
- Analytics dashboards and reporting
- A/B testing with UTM parameters

## Documentation

For detailed documentation and examples, visit the [project homepage](https://supermaker.ai/image/ai-minecraft-skin/).

## License

MIT
