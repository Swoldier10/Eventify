# Database Structure - Eventify

This document provides a comprehensive overview of the database structure for the Eventify application. Use this as a reference when developing new features or understanding existing data relationships.

## Database Information
- **Database Name**: `db_eventify`
- **Engine**: MySQL 8.0
- **Character Set**: utf8mb4 (supports full Unicode)
- **Collation**: utf8mb4_unicode_ci

## Table Overview

The database currently contains 9 tables organized into the following categories:

### Core Application Tables
- `users` - User accounts and authentication
- `password_reset_tokens` - Password reset functionality
- `sessions` - User session management

### System Tables
- `cache` - Application cache storage
- `cache_locks` - Cache locking mechanism
- `jobs` - Queue job processing
- `job_batches` - Batch job management
- `failed_jobs` - Failed job tracking
- `migrations` - Database migration tracking

---

## Detailed Table Structures

### Users (`users`)
**Purpose**: Core user authentication and profile management

| Column | Type | Null | Key | Default | Extra | Description |
|--------|------|------|-----|---------|--------|-------------|
| `id` | bigint unsigned | NO | PRI | NULL | auto_increment | Primary key |
| `first_name` | varchar(255) | NO | | NULL | | User's first name |
| `last_name` | varchar(255) | NO | | NULL | | User's last name |
| `name` | varchar(255) | NO | | NULL | | User's full name (combination of first_name + last_name) |
| `email` | varchar(255) | NO | UNI | NULL | | Unique email address |
| `email_verified_at` | timestamp | YES | | NULL | | Email verification timestamp |
| `password` | varchar(255) | NO | | NULL | | Hashed password |
| `remember_token` | varchar(100) | YES | | NULL | | "Remember me" token |
| `created_at` | timestamp | YES | | NULL | | Record creation time |
| `updated_at` | timestamp | YES | | NULL | | Last update time |

**Indexes**: 
- Primary: `id`
- Unique: `email`

**Model Attributes**:
- Mass assignable: `first_name`, `last_name`, `name`, `email`, `password`
- Hidden: `password`, `remember_token`
- Casts: `email_verified_at` → `datetime`, `password` → `hashed`

---

### Password Reset Tokens (`password_reset_tokens`)
**Purpose**: Manages password reset tokens for user authentication

| Column | Type | Null | Key | Default | Extra | Description |
|--------|------|------|-----|---------|--------|-------------|
| `email` | varchar(255) | NO | PRI | NULL | | User's email (primary key) |
| `token` | varchar(255) | NO | | NULL | | Reset token |
| `created_at` | timestamp | YES | | NULL | | Token creation time |

**Indexes**: 
- Primary: `email`

**Notes**: 
- One token per email address
- Tokens expire based on application configuration
- Used by Laravel's password reset functionality

---

### Sessions (`sessions`)
**Purpose**: Database-driven session storage for user authentication

| Column | Type | Null | Key | Default | Extra | Description |
|--------|------|------|-----|---------|--------|-------------|
| `id` | varchar(255) | NO | PRI | NULL | | Session identifier |
| `user_id` | bigint unsigned | YES | MUL | NULL | | Reference to authenticated user |
| `ip_address` | varchar(45) | YES | | NULL | | Client IP address (IPv4/IPv6) |
| `user_agent` | text | YES | | NULL | | Browser user agent |
| `payload` | longtext | NO | | NULL | | Serialized session data |
| `last_activity` | int | NO | MUL | NULL | | Unix timestamp of last activity |

**Indexes**: 
- Primary: `id`
- Index: `user_id`, `last_activity`

**Relationships**:
- `user_id` references `users.id` (soft reference, nullable for guest sessions)

---

### Cache (`cache`)
**Purpose**: Application cache storage for performance optimization

| Column | Type | Null | Key | Default | Extra | Description |
|--------|------|------|-----|---------|--------|-------------|
| `key` | varchar(255) | NO | PRI | NULL | | Cache key identifier |
| `value` | mediumtext | NO | | NULL | | Serialized cached value |
| `expiration` | int | NO | | NULL | | Unix timestamp when cache expires |

**Indexes**: 
- Primary: `key`

---

### Cache Locks (`cache_locks`)
**Purpose**: Prevents race conditions in cache operations

| Column | Type | Null | Key | Default | Extra | Description |
|--------|------|------|-----|---------|--------|-------------|
| `key` | varchar(255) | NO | PRI | NULL | | Lock key identifier |
| `owner` | varchar(255) | NO | | NULL | | Lock owner identifier |
| `expiration` | int | NO | | NULL | | Unix timestamp when lock expires |

**Indexes**: 
- Primary: `key`

---

### Jobs (`jobs`)
**Purpose**: Queue system for background job processing

| Column | Type | Null | Key | Default | Extra | Description |
|--------|------|------|-----|---------|--------|-------------|
| `id` | bigint unsigned | NO | PRI | NULL | auto_increment | Job identifier |
| `queue` | varchar(255) | NO | MUL | NULL | | Queue name |
| `payload` | longtext | NO | | NULL | | Serialized job data |
| `attempts` | tinyint unsigned | NO | | NULL | | Number of execution attempts |
| `reserved_at` | int unsigned | YES | | NULL | | When job was reserved for processing |
| `available_at` | int unsigned | NO | | NULL | | When job becomes available |
| `created_at` | int unsigned | NO | | NULL | | Job creation time |

**Indexes**: 
- Primary: `id`
- Index: `queue`

---

### Job Batches (`job_batches`)
**Purpose**: Manages batched job processing

| Column | Type | Null | Key | Default | Extra | Description |
|--------|------|------|-----|---------|--------|-------------|
| `id` | varchar(255) | NO | PRI | NULL | | Batch identifier |
| `name` | varchar(255) | NO | | NULL | | Batch name |
| `total_jobs` | int | NO | | NULL | | Total number of jobs in batch |
| `pending_jobs` | int | NO | | NULL | | Number of pending jobs |
| `failed_jobs` | int | NO | | NULL | | Number of failed jobs |
| `failed_job_ids` | longtext | NO | | NULL | | Serialized array of failed job IDs |
| `options` | mediumtext | YES | | NULL | | Serialized batch options |
| `cancelled_at` | int | YES | | NULL | | When batch was cancelled |
| `created_at` | int | NO | | NULL | | Batch creation time |
| `finished_at` | int | YES | | NULL | | When batch completed |

**Indexes**: 
- Primary: `id`

---

### Failed Jobs (`failed_jobs`)
**Purpose**: Tracks jobs that failed during processing

| Column | Type | Null | Key | Default | Extra | Description |
|--------|------|------|-----|---------|--------|-------------|
| `id` | bigint unsigned | NO | PRI | NULL | auto_increment | Failed job identifier |
| `uuid` | varchar(255) | NO | UNI | NULL | | Unique job identifier |
| `connection` | text | NO | | NULL | | Queue connection name |
| `queue` | text | NO | | NULL | | Queue name |
| `payload` | longtext | NO | | NULL | | Serialized job data |
| `exception` | longtext | NO | | NULL | | Exception details |
| `failed_at` | timestamp | NO | | CURRENT_TIMESTAMP | | When job failed |

**Indexes**: 
- Primary: `id`
- Unique: `uuid`

---

## Current Relationships

### Direct Relationships
- `sessions.user_id` → `users.id` (nullable foreign key)

### Logical Relationships
- `password_reset_tokens.email` → `users.email` (by email matching)

---

## Development Guidelines

### Adding New Tables
When creating new tables for Eventify features:

1. **Follow Laravel Conventions**:
   - Use plural table names (e.g., `events`, `bookings`)
   - Include `id`, `created_at`, `updated_at` columns
   - Use appropriate foreign key constraints

2. **Common Patterns**:
   - User-related tables should reference `users.id`
   - Use soft deletes for important business data
   - Include status/state columns where applicable

3. **Indexing**:
   - Index foreign keys
   - Index commonly queried columns
   - Consider composite indexes for multi-column queries

### Data Types
- **IDs**: `bigint unsigned` with auto_increment
- **Strings**: `varchar(255)` for most text, `text`/`longtext` for large content
- **Booleans**: `tinyint(1)` or use Laravel's `boolean()` method
- **Timestamps**: Use Laravel's `timestamps()` method
- **JSON**: Use `json` type for structured data

### Migration Best Practices
- Always include both `up()` and `down()` methods
- Use descriptive migration names
- Add foreign key constraints where appropriate
- Consider data migration implications for existing data

---

## Current System Configuration

### Cache System
- **Driver**: Database
- **Tables**: `cache`, `cache_locks`
- **Configuration**: Managed in `config/cache.php`

### Queue System
- **Driver**: Database
- **Tables**: `jobs`, `job_batches`, `failed_jobs`
- **Configuration**: Managed in `config/queue.php`

### Session Management
- **Driver**: Database
- **Table**: `sessions`
- **Configuration**: Managed in `config/session.php`

---

## Future Considerations

As you develop the Eventify application, consider these potential table additions:

- **Events**: Core event management
- **Categories**: Event categorization
- **Venues**: Event location management
- **Bookings/Registrations**: User event participation
- **Payments**: Payment processing records
- **Reviews/Ratings**: Event feedback system
- **Notifications**: User notification system

Each new feature should follow the established patterns and maintain referential integrity with the existing user system.

---

## Database Changes Log

### 2025-08-09 - User Registration Enhancement
**Migration**: `2025_08_09_144814_add_first_name_and_last_name_to_users_table.php`

**Purpose**: Enhanced user registration to support separate first and last names for better user management and personalization.

**Changes**:
- Added `first_name` varchar(255) NOT NULL to `users` table
- Added `last_name` varchar(255) NOT NULL to `users` table
- Updated User model `$fillable` to include `first_name`, `last_name`
- The `name` field continues to store the concatenated full name for backward compatibility

**Rationale**: 
- Improves user onboarding experience with separate name fields
- Enables better personalization in invitations and communications
- Maintains backward compatibility with existing `name` field
- Supports future features that may require individual name components