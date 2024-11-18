
# Bus Booking System Setup

This guide explains how to set up the Bus Booking System using XAMPP.

## Prerequisites
- [XAMPP](https://www.apachefriends.org/) installed on your system.
- A text editor for viewing/editing files (e.g., VS Code, Sublime Text).
- Web browser for testing.

## Installation Steps

### 1. Start XAMPP
1. Open the XAMPP Control Panel.
2. Start **Apache** and **MySQL** services.

### 2. Create the Database
1. Open `phpMyAdmin` by navigating to [http://localhost/phpmyadmin/](http://localhost/phpmyadmin/).
2. Click on **New** to create a new database.
3. Name the database: `bus_booking` and click **Create**.

### 3. Import the Database
1. In `phpMyAdmin`, select the `bus_booking` database.
2. Click on the **Import** tab.
3. Choose the SQL file (`bus_booking.sql`) provided in this project.
4. Click **Go** to import the database.

### 4. Configure the Project
1. Locate the `config.php` or equivalent configuration file in the project.
2. Update the database credentials to match your XAMPP setup:
   ```php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_NAME', 'bus_booking');
   ```

### 5. Access the Application
1. Place the project folder inside the `htdocs` directory (e.g., `C:\xampp\htdocs\bus_booking`).
2. Open your browser and navigate to [http://localhost/bus_booking](http://localhost/bus_booking).

### 6. Troubleshooting
If you encounter issues:
- Check if **Apache** and **MySQL** are running in XAMPP.
- Verify that the `bus_booking` database exists and contains tables.
- Review `mysql_error.log` in the XAMPP Control Panel for MySQL errors.

## Database Details
- **Database Name**: `bus_booking`
- **Tables**:
  - `booked`: Stores booking details.
  - `bus`: Stores bus information.
  - `location`: Contains terminal and city data.
  - `schedule_list`: Manages bus schedules.
  - `users`: Maintains user accounts.


## Database Table Details

### 1. `booked` Table
- **Purpose**: Stores booking details for bus schedules.
- **Columns**:
  - `id` (int): Primary Key, Auto-Increment.
  - `schedule_id` (int): Foreign key referencing `schedule_list`.
  - `ref_no` (text): Reference number for the booking.
  - `name` (varchar): Name of the customer.
  - `qty` (int): Number of seats booked.
  - `status` (tinyint): Booking status (1 = Paid, 0 = Unpaid).
  - `date_updated` (datetime): Auto-updated timestamp.

### 2. `bus` Table
- **Purpose**: Maintains bus information.
- **Columns**:
  - `id` (int): Primary Key, Auto-Increment.
  - `name` (varchar): Bus name.
  - `bus_number` (varchar): Unique bus number.
  - `status` (tinyint): Bus status (1 = Active, 0 = Inactive).
  - `date_updated` (datetime): Auto-updated timestamp.

### 3. `location` Table
- **Purpose**: Contains information about terminals and cities.
- **Columns**:
  - `id` (int): Primary Key, Auto-Increment.
  - `terminal_name` (text): Terminal name.
  - `city` (varchar): City name.
  - `state` (varchar): State name.
  - `status` (tinyint): Terminal status (1 = Active, 0 = Inactive).
  - `date_updated` (datetime): Auto-updated timestamp.

### 4. `schedule_list` Table
- **Purpose**: Tracks schedules for buses and routes.
- **Columns**:
  - `id` (int): Primary Key, Auto-Increment.
  - `bus_id` (int): Foreign key referencing `bus`.
  - `from_location` (int): Foreign key referencing `location`.
  - `to_location` (int): Foreign key referencing `location`.
  - `departure_time` (datetime): Departure time of the bus.
  - `eta` (datetime): Estimated time of arrival.
  - `status` (tinyint): Schedule status (1 = Active, 0 = Inactive).
  - `availability` (int): Seats available for booking.
  - `price` (text): Ticket price.
  - `date_updated` (timestamp): Auto-updated timestamp.

### 5. `users` Table
- **Purpose**: Manages system users, including admins and staff.
- **Columns**:
  - `id` (int): Primary Key, Auto-Increment.
  - `name` (varchar): User's name.
  - `user_type` (tinyint): User role (1 = Admin, 2 = Faculty, 3 = Student).
  - `username` (varchar): Login username.
  - `password` (varchar): Login password.
  - `status` (tinyint): User account status (1 = Active, 0 = Inactive).
  - `date_updated` (datetime): Auto-updated timestamp.

### Relationships Between Tables
1. **`schedule_list`**
   - References `bus` through `bus_id`.
   - References `location` through `from_location` and `to_location`.

2. **`booked`**
   - References `schedule_list` through `schedule_id`.
