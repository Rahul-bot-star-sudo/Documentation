### setup mysql database
* create a database and table where signup data will be stored.
  ```sql

    create datebase student_login;
    use student_login;
    create table users (
        id int auto_increment primary key
        username VARCHAR(100),
        email VARCHAR(100),
        password VARCHAR(100)
    );
    ```
1. create `DBUtil.java` (for DB connection)
   * `Class.forName`: Loads JDBC driver class.
   * `DrverManager.getConnection`: Connects to MySQL.

2. create `SignupServlet.java`
   * `HttpServletRequest`: Client (Angular) ka data le aata hai.
   * `HttpServletResponse`: Client ko response bhejta hai.
   * `PreparedStatement`: SQL injection se bachata hai (secure hota hai).
   * `res.setContentType(...)`: Angular ko format batata hai.

3. create `web.xml`
   * web.xml is a deployment descriptor.
   * Servlet ko kis URL par run karwana hai, ye url-pattern se hota hai.
4. angular `signup.ts` - frontend logic (user data send to backend)
   * fetch: JavaScript ka built-in function to call backend APIs.
   * POST method: Securely data send karta hai.
   * application/x-www-form-urlencoded: Servlet compatible format.
   * .then(...): Promise chaining, backend response handle karne ke liye
5. | Concept                             | Use                                          |
| ----------------------------------- | -------------------------------------------- |
| `DBUtil.getConnection()`            | MySQL se connection banata hai               |
| `HttpServletRequest.getParameter()` | Angular se aaya data read karta hai          |
| `PreparedStatement`                 | Secure query run karta hai                   |
| `res.getWriter().write(...)`        | Servlet se Angular ko response bhejta hai    |
| `web.xml`                           | Servlet URL define karta hai                 |
| `fetch()`                           | Angular se Servlet ko data bhejne ke liye    |
| `Content-Type`                      | Batata hai ki data kis format me ja raha hai |
| `application/x-www-form-urlencoded` | Servlet ke sath compatible data format       |
