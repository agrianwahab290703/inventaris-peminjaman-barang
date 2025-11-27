# Changelog

All notable changes to this project will be documented in this file.

## [1.0.0] - 2024-11-27

### Added
- ✨ Initial release of Sistem Inventaris Peminjaman Barang
- 📊 Dashboard with real-time statistics and charts
- 📂 Category management (CRUD)
- 📦 Item management with image upload
- 🔄 Borrowing management with automatic stock tracking
- 📈 Comprehensive reporting system
- 🎨 Blue and white design inspired by Tutwuri Handayani logo
- 🔍 Advanced search and filter functionality
- 🔔 Automatic overdue detection
- 📱 Responsive design
- 🖨️ Print/Export functionality for reports
- 📋 Database schema with migrations
- 🌱 Database seeder with sample data
- 📚 Comprehensive documentation (README, INSTALASI, PANDUAN_PENGGUNA, FITUR)

### Features
#### Dashboard
- Total items counter
- Available items tracker
- Active borrowings monitor
- Overdue alerts
- Monthly borrowing chart
- Recent borrowings list
- Low stock warnings
- Out of stock alerts

#### Category Management
- Add new categories
- Edit existing categories
- Delete categories (with validation)
- View category details with items
- Category-based filtering

#### Item Management
- Add items with unique codes
- Upload item images (JPG, PNG, GIF, max 2MB)
- Edit item information
- Track stock (total and available)
- Monitor item condition (Good, Light Damage, Heavy Damage)
- Set item location
- View borrowing history per item
- Multi-criteria filtering (category, condition, search)

#### Borrowing Management
- Record new borrowings
- Automatic borrowing code generation (BRW-YYYYMMDD-XXXX)
- Edit active borrowings
- Return process with condition tracking
- Automatic stock adjustment
- Borrowing status (Borrowed, Returned, Overdue)
- Automatic overdue detection
- Multi-field search

#### Reporting
- Borrowing reports with date filtering
- Item inventory reports
- Statistics and analytics
- Monthly borrowing trends
- Top 10 most borrowed items
- Category-wise statistics
- Print/Export functionality

### Technical
- Laravel 10.x framework
- MySQL database
- Chart.js for visualizations
- Font Awesome 6.4.0 icons
- Poppins Google Font
- Responsive CSS design
- RESTful routing
- Eloquent ORM
- Blade templating
- CSRF protection
- Input validation
- Password hashing

### Documentation
- Complete README.md
- Installation guide (INSTALASI.md)
- User manual (PANDUAN_PENGGUNA.md)
- Feature documentation (FITUR.md)
- Database SQL file for manual setup
- Inline code comments

### Security
- Password hashing with bcrypt
- CSRF token protection
- SQL injection prevention
- XSS protection
- Input validation and sanitization
- Role-based access control (Admin, User)

## Future Releases

### [1.1.0] - Planned
- Email notifications for overdue items
- Barcode/QR code scanning
- Export reports to Excel
- Advanced analytics dashboard
- Multi-language support (English, Indonesian)

### [1.2.0] - Planned
- Mobile application (Android/iOS)
- API for third-party integration
- Reservation system
- Fine/Penalty management
- Maintenance tracking

### [2.0.0] - Planned
- Asset depreciation tracking
- Multi-location support
- Advanced user roles and permissions
- Bulk operations
- Audit trail
- Dashboard customization

---

## Version Format

We use [Semantic Versioning](https://semver.org/):
- MAJOR version for incompatible API changes
- MINOR version for new functionality in a backwards compatible manner
- PATCH version for backwards compatible bug fixes

## Support

For support and updates, visit the repository or contact the development team.

---

**Dikembangkan dengan ❤️ untuk pendidikan Indonesia**
