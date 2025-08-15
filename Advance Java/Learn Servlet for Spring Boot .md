## **1. Client–Server Architecture (Servlet ke context me)**

Servlets hamesha **Client–Server model** me kaam karte hain.

**Diagram idea:**

```
[Client: Browser]  <--->  [Server: Tomcat with Servlet]
```

**Flow:**

1. **Client** (browser, mobile app, Postman) HTTP request bhejta hai — example: `GET /login`.
2. **Web Server (Tomcat)** request ko Servlet ko forward karta hai.
3. **Servlet** request ko process karta hai (database se data lena, calculation karna, etc.).
4. Servlet response generate karke **Web Server** ko deta hai.
5. **Server** client ko HTTP response bhejta hai (HTML, JSON, etc.).

💡 **Servlet is basically a Java program jo server par run hota hai aur HTTP request handle karta hai.**

---

## **2. Server Configuration**

Spring Boot me Tomcat already embedded hota hai, lekin agar tum Servlet seekh rahe ho pure Java EE style me, to tumhe Tomcat alag se configure karna hota hai.

**Steps:**

* Tomcat 11 download: [https://tomcat.apache.org/download-11.cgi](https://tomcat.apache.org/download-11.cgi)
* Extract folder: `C:\apache-tomcat-11.0.x`
* **Eclipse me Tomcat add:**

  1. `Window → Preferences → Server → Runtime Environments`
  2. `Add → Apache Tomcat v11.0`
  3. Tomcat installation directory select karo.
  4. Finish.

---

## **3. Download & Setup Eclipse**

* Download: [https://www.eclipse.org/downloads/packages/](https://www.eclipse.org/downloads/packages/)
* "Eclipse IDE for Enterprise Java and Web Developers" choose karo.
* Install & open.
* **Java 17+** required for Tomcat 11.

---

## **4. Create First Servlet**

**Servlet ka main structure:**

```java
import java.io.IOException;
import java.io.PrintWriter;
import jakarta.servlet.ServletException;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

public class FirstServlet extends HttpServlet {
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();
        out.println("<h1>Hello from First Servlet!</h1>");
    }
}
```

**Steps to create in Eclipse:**

1. **New Project → Dynamic Web Project**

   * Name: `ServletDemo`
   * Target runtime: Apache Tomcat v11
2. `src/main/java` me package banao (example: `com.demo`).
3. Class banao jo `HttpServlet` extend kare.
4. Override `doGet()` or `doPost()` method.
5. **web.xml me mapping karo:**

```xml
<servlet>
    <servlet-name>FirstServlet</servlet-name>
    <servlet-class>com.demo.FirstServlet</servlet-class>
</servlet>

<servlet-mapping>
    <servlet-name>FirstServlet</servlet-name>
    <url-pattern>/first</url-pattern>
</servlet-mapping>
```

6. Tomcat start karo → Browser me `http://localhost:8080/ServletDemo/first`.

---

## **5. Create Second Servlet**

Ye servlet request parameters accept karega.

**Code:**

```java
import java.io.IOException;
import java.io.PrintWriter;
import jakarta.servlet.ServletException;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

public class SecondServlet extends HttpServlet {
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {

        // Parameter lena (form se)
        String name = request.getParameter("name");
        String email = request.getParameter("email");

        // Response set karna
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();
        out.println("<h2>Hello " + name + "!</h2>");
        out.println("<p>Your email is: " + email + "</p>");
    }
}
```

**web.xml mapping:**

```xml
<servlet>
    <servlet-name>SecondServlet</servlet-name>
    <servlet-class>com.demo.SecondServlet</servlet-class>
</servlet>

<servlet-mapping>
    <servlet-name>SecondServlet</servlet-name>
    <url-pattern>/second</url-pattern>
</servlet-mapping>
```

**HTML form to test:**

```html
<form action="second" method="post">
    Name: <input type="text" name="name"><br>
    Email: <input type="email" name="email"><br>
    <button type="submit">Submit</button>
</form>
```

---

## **6. Detailed Difference Between First & Second Servlet**

| Feature          | First Servlet         | Second Servlet                      |
| ---------------- | --------------------- | ----------------------------------- |
| HTTP Method      | GET                   | POST                                |
| Input from user  | No                    | Yes (form data)                     |
| Purpose          | Static/Basic response | Dynamic content based on user input |
| Example URL call | `/first`              | `/second` via form                  |

---
