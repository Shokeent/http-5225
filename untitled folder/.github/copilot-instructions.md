<!-- Use this file to provide workspace-specific custom instructions to Copilot. For more details, visit https://code.visualstudio.com/docs/copilot/copilot-customization#_use-a-githubcopilotinstructionsmd-file -->

# Pet Profiles CMS - Copilot Instructions

This is a Pet Profiles Content Management System built with PHP and MySQL. When working on this project, please follow these guidelines:

## Project Context
- **Technology Stack**: PHP, MySQL, Bootstrap 5, Font Awesome
- **Purpose**: Pet adoption/showcase website with admin panel
- **Database**: MySQL with pets, admins, and breeds tables
- **Security**: Uses prepared statements, password hashing, and session management

## Code Style Guidelines
- Use PHP 7.4+ syntax and features
- Follow PSR-12 coding standards
- Use prepared statements for all database queries
- Implement proper error handling and validation
- Use `htmlspecialchars()` for XSS protection
- Hash passwords using `password_hash()` and verify with `password_verify()`

## File Structure
- `/admin/` - Administrative interface
- `/config/` - Configuration files
- `/database/` - SQL schema and data
- `/uploads/` - User uploaded files
- Root files for public interface

## Database Patterns
- Use PDO with prepared statements
- Include error handling for database operations
- Follow the existing schema structure
- Use transactions for complex operations

## Security Considerations
- Always validate and sanitize user input
- Use session management for authentication
- Implement file upload validation
- Follow principle of least privilege for database access

## UI/UX Guidelines
- Use Bootstrap 5 classes for consistent styling
- Include Font Awesome icons for better UX
- Ensure responsive design for mobile compatibility
- Follow the existing color scheme and layout patterns

## Common Tasks
- When adding new features, follow the existing MVC-like structure
- Include proper error messages and success notifications
- Implement CRUD operations following the existing patterns
- Add appropriate navigation and breadcrumbs
