import './bootstrap';

import 'bootstrap/dist/css/bootstrap.min.css';

module.exports = {
    content: [
        './resources/views/**/*.blade.php', // All Blade templates
        './resources/js/**/*.js',          // JavaScript files
        './resources/js/**/*.vue',         // Vue components
        './resources/css/**/*.css',        // Custom CSS files
        './public/**/*.html',              // Static HTML files in the public directory
        './app/**/*.php'                   // PHP files (optional, if Tailwind classes are used dynamically)
    ],
    theme: {
        extend: {},
    },
    plugins: [],
};
