# CanineCompassionCenter

Project Description
This is a group project for SDEV 328 class with the end goal of creating our very own web page using the Fat-Free model utilizing session data, Object Oriented Programming, and server side verification.
The Canine Compassion Center is a dog adoption platform designed to help users find and adopt their perfect canine companion. The platform features various functionalities, including user sign-up and login, viewing available dogs, filtering dogs based on different attributes, scheduling appointments, and admin functionalities for managing the dog database and appointments.

URL of Web Application
[insert here]

Authors
Everett, Pedro, Nathan

Project Requirements Implementation

1. MVC Pattern
Model-View-Controller (MVC) Pattern:
Models: Defined in the model folder, including data-layers.php, dataCommands.php, and validation.php.
Views: HTML files located in the views folder (e.g., admin.html, home.html, login.html, ourDogs.html, schedule.html, signUp.html).
Controllers: Handled by controller.php in the controller folder. The main entry point is index.php.

2. Routing and Templating
Routing and Templating:
Routes all URLs using the Fat-Free framework. Defined in index.php.
Leverages a templating language with <include> tags for including common HTML components (e.g., header.html).

3. Database Layer
Database Layer:
Clearly defined using PDO and prepared statements in dataCommands.php and controller.php.

4. Data can be added and viewed
Data can be added and viewed through various forms and tables in the admin panel (admin.html).

5. Git History and Collaboration
Git History:
The project has a history of commits from both team members. Commits are clearly commented and can be viewed in the GitHub repository's Insights -> Contributors section.

6. Object-Oriented Programming and Inheritance
OOP and Inheritance:
Multiple classes are used, including Pets, Dogs, CanineUsers, and Admins.
Dogs class inherits from Pets.
Admins class inherits from CanineUsers.

7. Documentation and Standards
Documentation and Standards:
Full Docblocks are provided for all PHP files, following PEAR standards.
Example: admins.php, dogs.php, pets.php, users.php, controller.php, data-layers.php, dataCommands.php, validation.php.

8. Server-Side Validation
Server-Side Validation:
Full validation on the server side is implemented in validation.php.

9. Code Quality
Code Quality:
All code is clean, clear, and well-commented.
DRY (Don't Repeat Yourself) principles are practiced.

10. Professional Submission
Professional Submission:
The project is professional and shows adequate effort for a final project in a full-stack web development course.

Most Current UML Class Diagram  
<img width="1626" alt="CurrentUmlDiagramNTR" src="https://github.com/EverettHanke/CanineCompassionCenter/assets/141577452/413c304c-2092-4f08-9873-3e5b91d2092f">


Temporary admin login username and password, if applicable
[insert here]

Report from GitHub
Everette - 77 commits (2,113++, 937--)
Pedro - 29 commits (362++, 117--)
Nathan - 15 commits (1,346++, 491--)
