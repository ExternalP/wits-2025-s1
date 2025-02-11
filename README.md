# NEED TO ORGANISE TASKS

### Also on wiki: https://github.com/AdyGCode/wits-2025-s1/wiki


# Student Cheat Sheet SaaS Application Mini Project Brief

## Project Overview
Web-based system for managing student class rosters with photos and personal details, providing lecturers with visual cheat sheets for their sessions.

The project does NOT need a timetabling capability. It acts as a cheat sheet for lecturers.

## Technical Stack
- Laravel 11
- PHP 8.3
- SQL Database (Primary)
- Optional: Livewire, MongoDB
- GitHub for version control

## Team Structure and Timeline
- 4 team members
- 3-week development timeline
- Collaborative development via GitHub repository
- Project management through GitHub Projects and Issues

## Roles and Permissions

### Role Hierarchy
- Super Admin
    - System configuration
    - Role management
    - Domain whitelist management
- Admin
    - User management
    - Data import/export
    - Backup management
- Staff
    - Session management
    - Student approval
    - Report generation
- Student
    - Profile management
    - Change requests
    - Photo submission

### Permission Matrix
| Permission               | SuperAdmin | Admin | Staff | Student |
| ------------------------ | ---------- | ----- | ----- | ------- |
| System Configuration     | ✓          | -     | -     | -       |
| Manage Roles             | ✓          | -     | -     | -       |
| Manage Domains           | ✓          | ✓     | -     | -       |
| User Management          | ✓          | ✓     | -     | -       |
| Backup Management        | ✓          | ✓     | -     | -       |
| Import/Export            | ✓          | ✓     | -     | -       |
| Class Session Management | ✓          | ✓     | ✓     | -       |
| Approve Changes          | ✓          | ✓     | ✓     | -       |
| View All Class Sessions  | ✓          | ✓     | -     | -       |
| View Own Class Sessions  | ✓          | ✓     | ✓     | -       |
| Edit Own Profile         | ✓          | ✓     | ✓     | ✓       |
| Request Changes          | ✓          | ✓     | ✓     | ✓       |

# Feature Requirements

## Core Infrastructure
- Laravel 11 based system
- PHP 8.3 compatibility
- SQL database (SQLite for development)
- Secure file storage system
- Domain email validation system
- Automated backup system

## Authentication & Authorization
- Role-based access control:
    - Super Admin: Full system access
    - Admin: System management
    - Staff: Class management
    - Student: Personal profile access
- Email verification system
- Domain whitelist management
- Password security requirements

## User Management
- Profile Requirements:
    - Given and/or Family name (at least one required)
    - Preferred name (optional)
    - Preferred pronouns
    - Valid email from approved domain
    - Profile photo
- Change request system for updates
- Email verification and bounce checking

## Image Management
- Upload Requirements:
    - PNG/JPG formats only
    - Size: 250KB maximum
    - Dimensions: 512x512px minimum, 1024x1024px maximum
- Processing Features:
    - Automatic resizing
    - Interactive cropping interface
    - AI-assisted face detection
    - Head/shoulders positioning guide
    - Web Cam capture interface
    - Drag-and-drop upload
- Storage Features:
    - UUID-based file naming
    - Secure storage location
    - Download prevention
    - Multiple image versions (original, processed, thumbnail)

## Course Management
- Data Structure:
    - Packages (contains multiple courses)
    - Courses (core, specialist, elective units)
    - Units (part of courses and clusters)
    - Clusters (1-8 units)
- Import Capabilities:
    - CSV/Excel file support
    - Data validation
    - Error handling
    - Relationship verification

## Session Management
- Features:
    - Course/Cluster assignment
    - Start/End dates
    - Duration tracking
    - Lecturer assignment
- Import Options:
    - CSV/Excel import
    - ICS feed integration
    - Manual entry
- Scheduling:
    - Conflict detection
    - Calendar interface
    - Duration validation

## Cheat Sheet Generation
- Features:
    - Student photos
    - Names (Given, Family, Preferred)
    - Pronouns
    - Session-specific grouping
    - Print optimization
    - Layout customization

## Data Import/Export
- Import Validation:
    - File format verification
    - Schema validation
    - Data type checking
    - Relationship integrity
    - Error reporting
- Export Features:
    - Full system backup
    - Selective data export
    - Multiple format support

## System Administration
- Backup Management:
    - Daily automated backups
    - 30-day retention
    - Monthly archives
    - Annual archives
    - Integrity verification
- System Configuration:
    - Email domain management
    - Role/Permission settings
    - System parameters
    - Import/Export settings

## Development Requirements
- Version Control:
    - GitHub repository
    - Branch protection rules
    - Pull request workflow
    - Code review process
- Testing:
    - Pest testing framework
    - Required test coverage
    - Integration tests
    - Unit tests
- Documentation:
    - Code documentation
    - API documentation
    - User guides
    - Setup instructions
