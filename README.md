# Simple Package for Multi Audit Trail Table

This package simplifies the management of models that use audit trails, enabling multiple audit tables for each module within your Laravel web application.

## Support the Project
If you find this package useful, consider supporting its development:

[![Support Me](https://img.shields.io/badge/Support%20Me-Saweria-orange)](https://saweria.co/rakaarif)

## Installation

1. Install the package via composer:
   ```bash
   composer require govelid/laravel-multi-auditable
   ```

2. Example: Run the following Artisan command to create the necessary files:
   ```bash
   php artisan make:auditable ProjectAuditable
   ```
   This will generate:
   - A migration file for the table `project_auditables`.
   - A Trait file `ProjectAuditableTrait`.
   - A Model file `ProjectAuditable`.

3. To add audit trail functionality to the `Project` model, simply include the trait:
   ```php
   use ProjectAuditableTrait;
   ```

## Customization

You can override the following methods in your model for further customization:

### Timestamp Attributes

Override the default timestamp attributes (e.g., `created_at`, `updated_at`):
```php
protected function getTimestampAttributes()
{
    return ['updated_at', 'created_at'];
}
```

### Audit Record ID

Specify the audit record ID (defaults to `id`):
```php
public function getAuditRecordId()
{
    return $this->id;
}
```

### Audit Fields Notes

Add custom notes for audit trails:
```php
public function getAuditFieldsNotes()
{
    return $this->id;
}
```

### Audit Fields for Delete

Define the fields to be logged during deletion:
```php
public function getAuditFieldsForDelete()
{
    return ['id'];
}
```

---
