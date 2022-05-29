<div style="text-align:center">
  <img src="/images/ptvrs.png" style="border: solid 1px; border-color: #f0f0f0">
</div>  

### Public Traffic Violation Reporting System



A system for general public to click a photo of a traffic violation anywhere and report it. The system also rewards the users once there report is approved by the admin.


## Pages
1. Home Page
2. Report Page
3. Pay Challan Page
4. Login/Register Page
5. Contact Page
6. About Page
7. Admin Dashboard
8. Challans Generation Page
9. Challan List Page
10. My Rewards Page
11. My Reports Page

## Features
1. Login & Register
2. Admin and user login partition
3. Working contact page (Built using phpmailer)
4. Fully functional reporting/challan system
5. Live search for the challans on pay challan
6. Admin functionalities for approval and challan generation

## Accessibility

### For Visitors
Visitors can see **home, contact, about, login and register, pay challan** pages only

### For Users
Users can visit all the visitor pages and also the **report page, my reports and my rewards** where they can report, see there reports and rewards

### For Admins
Admins can visit all the user pages and additionally they have access to **dashboard** where they can approve reports **generate challan** page, wherein they can generate challan and **all challans** where they can see all challans.

## Dependency

To run the project you need two additional dependencies

1. php7.4-cli
2. php-mysqli

You can install them directly using `sudo apt install php7.4-cli php-mydqli` on linux.

## Instructions (To download and use)

1. Clone the repository `git clone https://github.com/saiteja13427/incentivised-traffic-violation-reporting-system.git`
2. Edit **env.php** and add your **db password (for database connection), sender email, sender email password, admin email(reciever email), admin name**.
3. Start a php server using `php -S localhost:8000` and visit http://localhost:8000/views/index.php
4. The program will automatically create required database and tables.
5. The program will by default create 1 admin and 1 user account
    `Admin Credentials:
        Username: admin
        Password: admin
    User Credentials:
        Username: user
        Password: user`
6. The project will be ready for use.
7. Run it on a server and navigate to **views/home.php** to start
8. You can login using respective roles to see the additional features for those roles.