## Restaurant Menu 🧑🏼‍🍳

This web app using Laravel for building API and VueJS as the frontend

#### API Documentation 📃
[Postman Workspace](https://www.postman.com/warped-sunset-655570/workspace/restaurant-menu) (APIs menu)

#### API Response Format 🍳
[JSend (with some adjustment)](https://github.com/omniti-labs/jsend)

#### Design Pattern
View => Controller -> Service -> Repository => Model
- **View**<br>
Displaying the user interface
- **Controller**<br>
Receive request and return response
- **Service**<br>
The business logic layer, calls the repository to provide the data result to the controller
- **Repository**<br>
As the data layer, access it from the Model
- **Model**<br>
Representation of table in the database

#### Git Commit Convention
[Conventional Commits v1.0.0](https://www.conventionalcommits.org/en/v1.0.0)