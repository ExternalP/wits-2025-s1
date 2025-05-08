# Student Cheat Sheet SaaS Application Mini Project Brief

### Also on wiki: https://github.com/AdyGCode/wits-2025-s1/wiki


<!-- TOC -->
* [Project Overview](#project-overview)
  * [Technical Stack](#technical-stack)
  * [Team Structure and Timeline](#team-structure-and-timeline)
  * [Development Requirements](#development-requirements)
  * [Core Infrastructure](#core-infrastructure)
  * [Data Structure Notes:](#data-structure-notes)
    * [Packages](#packages-)
    * [Courses](#courses)
    * [Clusters](#clusters)
    * [Units](#units)
* [Feature Requirements](#feature-requirements)
  * [1. User Management](#1-user-management)
  * [2. Authentication & Authorization](#2-authentication--authorization-)
  * [3. Roles and Permissions](#3-roles-and-permissions)
    * [3.1 Role Hierarchy](#31-role-hierarchy)
    * [3.2 Permission Matrix](#32-permission-matrix)
  * [4. Course Management](#4-course-management)
  * [5. Session Management](#5-session-management)
  * [6. Cheat Sheet Generation](#6-cheat-sheet-generation)
  * [7. System Administration](#7-system-administration)
  * [8. Data Import/Export](#8-data-importexport)
  * [9. Image Management](#9-image-management)
* [Dev Tools](#dev-tools)
<!-- TOC -->



# Project Overview
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


### Team Members

- Adrian Gould [AdyGCode](https://github.com/AdyGCode) (Consulting Senior Dev)
- Corin Little [ExternalP](https://github.com/ExternalP) (Developer)
- Given Name [GITHUB USERNAME](https://github.com/GITHUB_USERNAME) (Developer)
- Yunjeong Gu [Chloe23077](https://github.com/Chloe23077) (Developer)
- Luis Alvarez [luis199521](https://github.com/luis199521) (Developer)
- Given Name [GITHUB USERNAME](https://github.com/GITHUB_USERNAME) (Developer)
- Given Name [GITHUB USERNAME](https://github.com/GITHUB_USERNAME) (Developer)


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

## Core Infrastructure
- Laravel 11 based system
- PHP 8.3 compatibility
- SQL database (SQLite for development)
- Secure file storage system
- Domain email validation system
- Automated backup system

## Data Structure Notes:
- Packages (contains multiple courses) - `The general category of a course ie. the diploma of web development is part of the package of IT`
- Courses (core, specialist, elective units) - `the diploma/certificate`
- Units (part of courses and clusters)
- Clusters (1-8 units)


### Packages 
| **National Code** | **Title**                                  | **TGA Status** |
|-------------------|--------------------------------------------|----------------|
| BSB               | Business Services Training Package         | Current        |
| CUA               | Creative Arts and Culture Training Package | Current        |
- TGA stands for "Training.gov.au"


### Courses
| **National Code** | **AQF Level**     | **Title** | **TGA Status** | **State Code** | **Nominal Hours** | **Type**      | **Package ID** |
|-------------------|-------------------|-----------|----------------|----------------|-------------------|---------------|----------------|
| CUA40715          | Certificate IV in | Design    | Current        | AZN5           | 665               | Qualification | 2              |
| CUA40113          | Certificate IV in | Dance     | Current        | J697           | 690               | Qualification | 2              |
- Has pivot table course_unit to track units in course


### Clusters
| **Code** | **Title**            | **Qualification** | **State Code** | **Course ID** |
|----------|----------------------|-------------------|----------------|---------------|
| ADVPROG  | Advanced Programming | ICT50220          | AC21           | 253           |
| BIGDAT   | Big Data             | ICT50220          | AC21           | 253           |
- Has pivot table cluster_unit to track units in cluster


### Units
| **National Code** | **Title**                                       | **TGA Status** | **State Code** | **Nominal Hours** |
|-------------------|-------------------------------------------------|----------------|----------------|-------------------|
| BSBMKG402         | Analyse consumer behaviour for specific markets | Replaced       | AUJ44          | 50                |
| BSBADM101         | Use business equipment and resources            | Current        | AUJ55          | 20                |
- Has pivot table course_unit to track units in course
- Has pivot table cluster_unit to track units in cluster



# Feature Requirements

## 1. User Management
- Profile Requirements:
    - Given and/or Family name (at least one required)
    - Preferred name (optional)
    - Preferred pronouns
    - Valid email from approved domain
    - Profile photo
- Change request system for updates
- Email verification and bounce checking


## 2. Authentication & Authorization 
- Role-based access control:
    - Super Admin: Full system access
    - Admin: System management
    - Staff: Class management
    - Student: Personal profile access
- Email verification system
- Domain whitelist management
- Password security requirements


## 3. Roles and Permissions

### 3.1 Role Hierarchy
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

### 3.2 Permission Matrix
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


## 4. Course Management
- Data Structure:
    - Packages (contains multiple courses) - `The general category of a course ie. the diploma of web development is part of the package of IT`
    - Courses (core, specialist, elective units) - `the diploma/certificate`
    - Units (part of courses and clusters)
    - Clusters (1-8 units)
- Import Capabilities:
    - CSV/Excel file support
    - Data validation
    - Error handling
    - Relationship verification


## 5. Session Management
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


## 6. Cheat Sheet Generation
- Features:
    - Student photos
    - Names (Given, Family, Preferred)
    - Pronouns
    - Session-specific grouping
    - Print optimization
    - Layout customization


## 7. System Administration
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


## 8. Data Import/Export
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


## 9. Image Management
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


# Dev Tools
- laravel-ide-helper: https://github.com/barryvdh/laravel-ide-helper \
  (helps with laravel autocompletion)
- 


