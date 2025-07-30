# Uploads Directory

This directory stores uploaded pet photos.

## Security Notes
- Only image files (JPEG, PNG, GIF) should be uploaded
- Maximum file size is limited to 5MB
- Files are renamed with unique IDs to prevent conflicts
- Direct access to this directory should be restricted in production

## Permissions
Make sure this directory has write permissions (755 or 777) for the web server.
