# Advanced Programming Capstone Project

This is a **Laravel 12.x** based **Projects Management System** built for the AP Capstone use case.  
The system manages **Programs, Projects, Facilities, Services, Equipment, Participants, and Outcomes**, implementing all required relationships and CRUD operations.

---

## Features

### Programs
- Create, view, edit, delete programs.
- Each **Program** has multiple **Projects**.
- View projects under a particular program.

### Facilities
- Manage facilities (create, edit, delete).
- Each **Facility** has **Projects, Services, and Equipment**.
- Facility details page lists all related entities.

### Services
- Scoped under **Facilities**.
- Manage services offered by a facility.

### Equipment
- Scoped under **Facilities**.
- Manage available equipment.
- Search/filter equipment by capability.

### Projects
- Belongs to **Program** and **Facility**.
- Manage CRUD operations for projects.
- Assign participants and outcomes.
- List projects under programs and facilities.

### Participants
- Manage participants.
- Assign/remove participants from projects.

### Outcomes
- Attach outcomes to a project.
- Manage project outcome details.
- Link/upload outcome artifacts.

---

## Tech Stack

- **Backend:** Laravel 12.x (PHP 8.3)
- **Frontend:** Blade Templates + Bootstrap + AdminLTE
- **Data Storage:** JSON (Fake repositories in `app/Data`)
- **Icons:** FontAwesome
- **Build Tool:** Vite (for assets)

---

## 📂 Project Structure

## ⚙️ Setup & Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/your-username/projects-management-system.git
   cd projects-management-system

2. **Install dependencies**
   ```bash
composer install
npm install
