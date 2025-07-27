## 📝 Table of Contents

## 📝 Table of Contents
| 🧭 **Servlet Topics**                    | 📌 **JDBC Topics**                     | 🧭 **Servlet Topics (Extra)**         | 📌 **JDBC Topics (Extra)**            |
|-----------------------------------------|----------------------------------------|---------------------------------------|----------------------------------------|
| [1. Servlet](#1-servlet)         | [1. JDBC](#1-jdbc)            | [11. Filter](#11-filter)                        | [11. Batch Processing](#11-batch-processing)            |
| [Servlet life cycle](#servlet-life-cycle)      | [2. JDBC Connection Steps](#2-jdbc-connection-steps) | [12. Listener](#12-listener)                    | [12. AutoCommit & Transactions](#12-autocommit--transaction-management) |
| [3. doGet vs doPost](#3-doget-vs-dopost)          | [3. Statement vs PreparedStatement](#3-statement-vs-preparedstatement) | [13. Dispatcher](#13-dispatcher)               | [13. Scrollable ResultSet](#13-scrollableupdatable-resultset)       |
| [4. Session Management](#4-session-management)    | [4. Connection Pooling](#4-connection-pooling) | [14. Annotations](#14-annotations)             | [14. MetaData](#14-metadata)                       |
| [5. ServletConfig vs Context](#5-servletconfig-vs-context) | [5. SQL Injection](#5-sql-injection)     | [15. Exception Handling](#15-exception-handling) | [15. Blob/Clob](#15-blobclob-handling)             |
| [6. Forward vs sendRedirect](#6-forward-vs-sendredirect) | [6. try-with-resources](#6-try-with-resources) | [16. Multipart File Upload](#16-multipart-file-upload) | [16. CallableStatement](#16-callablestatement)     |
| [7. MVC Pattern](#7-mvc-pattern)         | [7. JDBC Interview Questions](#7-jdbc-interview-questions) | [17. Cookies & Headers](#17-cookies--headers) | [17. Connection Pool Libraries](#17-connection-pool-library-use) |

# 1. Servlet 

## Definition (What is the concept?)
A **Servlet** is a Java class used to handle requests and responses in a **web application**. It runs on a **web server** and extends the capabilities of servers by generating dynamic web content (like HTML).
Servlet ek java class hai jo server par chalta hai aur client (browser) se request lekar response bhejta hai. Ye web applications ka backend logic likhne ke liye use hota hai - jaise form data process karna, dynamic content generate karna ya database se data fetch karna.

## Use (Kab aur kyu use hota hai)
Servlet tab use hota hai jab hume client (web browser) se data lena ya bhejana ho, ya dynamic web pages banana ho. Form submission handle karni ho ya backend me kuch processing karni ho toh servlet ideal hai.

## Code Example(Chhota aur clean)
```java
@WebServlet("/hello")
public class HelloServlet extends HttpServlet {
    protected void doGet(HttpServletRequest req, HttpServletResponse res)
        throws ServletException, IOException{
            res.setContentType("text/html");
            PrintWriter out = res.getWriter();
            out.println("Hello, Servlet");
            out.close();
        }
}
```

## Real life analogy (Samajhne me esy ho)
Servlet ek waiter ki tarah kaam karta hai restaurant me customet order deta hai waiter kitchen (server) tak order pahuchata hai aur wapas khana (response) lekar customer ko deta hai.

## Interview Point (Common Questions ya confusion)
## Servlet life cycle: What happens in init(), service(),destroy()?

### Servlet life cycle

## Difference beetween GET and POST request
## How to manage session in servlet
## Exception handling in servlets
## forward() vs sendRedirect()
## ServletContext vs ServletConfig
## Session management: Cookies, URL Rewriting, HttpSession, hidden form fields
## doGet() vs doPost() difference 
  
# 1. JDBC
## Definition(Concept kya hai)
JDBC(Java database connectivity) ek java api hai jo java application ko database se connect karne, query run karne aur rsult receive karne ki facility deta hai.

## Use (Kab aur kyu use hota hai)
Jab java application ko kisi bhi RDBMS (like MySQL,Oracle,etc.) ke sath connect karna ho ya database se data insert,update,delete ya fetch karna ho, tab JDBC use hota hai

## Code Example (chota aur clean)
```java
// database connection
Connection con = DriverManager.getConnection(
    "jdbc:mysql://localhost:3306/dbname","user","password"
);
// query execution
Statement stmt = con.createStatement();
ResultSet rs = stmt.executeQuery("Select * From users");

while(rs.next()){
    System.out.println(rs.getString("username"));
}
// resource cleanup
rs.close();
stmt.close();
con.close();

```
## Real life analogy (Samajhne me easy ho)
JDBC bilkul telephone line ki tarah hai:jaise phone line se hum kisi se bat kar sakate hai waise hi jdbc se hum java aur database ke beech bat cheet(communication) karate hai.

## Interview point (Common questions ya confusion)
## Difference between statement and preparedstatement
* 
## What is Connection Pooling?
## How to handle sql injection
## try-with-resources is JDBC
## Sql injection kya hai kaise rokoge?
## Connection Pooling kya hai?
## JDBC connection steps.
* 

## Important Points
##. Load driver (auto in latest java)
##. Connection ceate karo
##. Statement banao
##. Query execute karo
##. Result process karo
##. Resources close karo

# Servlet-Extra Interview Points
## Filter: Request/response ko process karne se pahle ya bad modify kar sakte hain(e.g, authentication, logging).
## Listener: Events monitor karne ke liye (session create/destroy,attribute change, context lifecycle).
## Exception Handling: web.xml ya @WebServlet annotation me error-page mapping.
## Multipart/form-data Handling: File upload servlet se kaise hota hai (use Apache Commons FileUpload ya Servlet 3+.getPart()).
## Tread Safety: Servlet shared hote hain, variables synchronize ya thread-local banana padta hai.
## Dispatcher: RequestDispatcher—forward() (server-side transfer), include() (content embed karna).
## Annotations: @WebServlet, @WebFilter, @WebListener—modern config sirf code se possible.
## Cookies/Headers Management: Custom header/cookie set/get karna.

# JDBC-Extra Interview Points

Batch Processing: Multiple queries ek hi time par * bhejna (stmt.addBatch(), stmt.executeBatch())—performance improve karne ke liye.

## AutoCommit & Transaction Management: con.setAutoCommit(false), con.commit(), con.rollback()—atomic operations ke liye.

## Scrollable/Updatable ResultSet: ResultSet.TYPE_SCROLL_INSENSITIVE, ResultSet.CONCUR_UPDATABLE—records back/forth padhna/edit karna.

## MetaData: DatabaseMetaData, ResultSetMetaData—table, column info dynamically lena.

## Blob/Clob Handling: Images, files ya large text database me store/fetch karna (rs.getBlob, rs.getClob).

## CallableStatement: Stored procedures call karna (CallableStatement cs = con.prepareCall()).

## Connection Pool Library Use: (e.g., HikariCP, Apache DBCP)—production me fast, reusable connections.