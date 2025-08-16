### point coverd in servlet tutorial
  |  Consept Name     | Consept Covered |
  |-------------------------------------------------------------|-------------------------------------------------------------------------------|
  | 1. create servlet using impliment servlet interface | [create servlet using implement servlet interface](#create-servlet-using-implement-servlet-interface) |
  | 1. create servlet using neneric servlet | [create servlet using generic servlet](#create-servlet-using-generic-servlet) |

### create servlet using implement servlet interface
```servlet
package com.servlets;
import javax.servlet.*;
import java.io.IOException;
import java.io.PrintWriter;
import java.util.Date;
public class FirstServlet implements Servlet{
    // Life cycle methods
    
    ServletConfig conf;
    
    public void init(ServletConfig conf)
    {
        this.conf=conf;
        System.out.println("creating object:...");
        
    }
   public void service(ServletRequest req, ServletResponse resp) throws ServletException, IOException {
        System.out.println("Servicing....");
        resp.setContentType("text/html");
        PrintWriter out = resp.getWriter();
        out.println("<h1>this is my output from servlet method</h1>");
        out.println("<h1>Today date and time is "+new Date().toString()+"</h1>");
    }
   public void destroy(){
       System.out.println("going to destroy servlet object");
   }
   // non life cycle methods
   public ServletConfig getServletConfig(){
       return this.conf;
       
   }
   public String getServletInfo(){
       return "this servlet is created by rahul shinde";
   }
}
```

### create servlet using generic servlet

```servlet
package com.example;
import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.GenericServlet;
import javax.servlet.ServletException;
import javax.servlet.ServletRequest;
import javax.servlet.ServletResponse;

public class HelloGenericServlet extends GenericServlet {

    @Override
    public void init() throws ServletException {
        // 1-time initialization (optional)
        System.out.println("HelloGenericServlet initialized!");
    }

    @Override
    public void service(ServletRequest req, ServletResponse res)
            throws ServletException, IOException {

        // Request se parameter lo (HTTP specific cheeze yaha directly nahi milti,
        // par query param mil jata hai)
        String name = req.getParameter("name");
        if (name == null || name.trim().isEmpty()) {
            name = "Guest";
        }

        // Response content type set karo
        res.setContentType("text/html");

        PrintWriter out = res.getWriter();
        out.println("<!DOCTYPE html>");
        out.println("<html><head><title>Hello</title></head><body>");
        out.println("<h1>Hello, " + name + " (from GenericServlet)</h1>");
        out.println("<p>Time: " + new java.util.Date() + "</p>");
        out.println("</body></html>");
        out.flush();
    }

    @Override
    public void destroy() {
        // Cleanup (optional)
        System.out.println("HelloGenericServlet destroyed!");
    }
}

```
Bahut accha likha hai 👏 Rahul! Code bilkul sahi hai, sirf thoda polish aur **interview point of view** se kuch extra points add kiye ja sakte hain.

---

## ✅ Galti / Improvements

1. **Table Heading Formatting**
   Aapne `"This in name of consepts"` likha hai, ise `"Concept Name"` aur `"Concept Covered"` likhna chahiye. (Professional aur clean lagega.)

2. **Markdown Anchor Links**
   Ye sahi hai, bas spelling match karna zaroori hai:

   * `#create-servlet-using-implement-servlet-interface`
   * `#create-servlet-using-generic-servlet`
     (Aapke link me aur section heading me spelling same hai, so no issue.)

3. **Servlet Code**

   * `getServletConfig()` method me `return null;` likha hai → Interview me pucha ja sakta hai ki "agar yaha `null` return hua to kya hoga?"
     ✅ Best hai ki actual `config` store karke return karo.
   * GenericServlet example me aapne `flush()` kiya hai → Actually `flush()` optional hai kyunki servlet container khud response close/flush kar deta hai.

---

## 🎯 Interview Me Puchhe Jane Wale Sawal (Aur Answers)

Maine niche **har servlet example ke sath interview question add kiye hain**, jisse aapko help milegi:

---

### 1. Servlet Interface Example (Low Level)

**Code Improvement:**

```java
private ServletConfig config;

@Override
public void init(ServletConfig config) throws ServletException {
    this.config = config;
    System.out.println("Servlet Initialized");
}

@Override
public ServletConfig getServletConfig() {
    return this.config;
}
```

**Interview Questions:**

1. **Q:** Servlet life cycle methods kaunse hote hain?
   **A:** `init()`, `service()`, `destroy()`

2. **Q:** ServletConfig aur ServletContext me kya difference hai?
   **A:**

   * `ServletConfig`: Single servlet ka configuration (per servlet).
   * `ServletContext`: Application level configuration (shared by all servlets).

3. **Q:** Agar ek servlet ko multiple requests aati hain to kya har baar `init()` call hota hai?
   **A:** Nahi, `init()` sirf ek baar servlet load hote waqt call hota hai, har request par `service()` call hota hai.

---

### 2. GenericServlet Example (Abstract Layer)

**Code Thoda Better:**

```java
@Override
public void service(ServletRequest req, ServletResponse res)
        throws ServletException, IOException {

    String name = req.getParameter("name");
    if (name == null || name.trim().isEmpty()) {
        name = "Guest";
    }

    res.setContentType("text/html");
    PrintWriter out = res.getWriter();

    out.println("<!DOCTYPE html>");
    out.println("<html><head><title>Hello</title></head><body>");
    out.println("<h1>Hello, " + name + " (from GenericServlet)</h1>");
    out.println("<p>Server: " + getServletContext().getServerInfo() + "</p>");
    out.println("<p>Time: " + new java.util.Date() + "</p>");
    out.println("</body></html>");
}
```

**Interview Questions:**

1. **Q:** GenericServlet aur Servlet interface me kya difference hai?
   **A:**

   * `Servlet` interface me sare methods implement karne padte hain.
   * `GenericServlet` ek abstract class hai jo `Servlet` ko implement karti hai aur non-essential methods ka default implementation deti hai.

2. **Q:** GenericServlet mainly kis type ke protocol ke liye bana hai?
   **A:** Ye protocol-independent hai (HTTP, FTP, SMTP sab ke liye use ho sakta hai).

3. **Q:** Agar sirf HTTP protocol ke liye kaam karna hai to konsa servlet use karte hain?
   **A:** `HttpServlet` (jo `GenericServlet` ko extend karta hai).

---

## 🚀 Extra Interview Prep Tips

Aapse pucha ja sakta hai:

* Servlet threading model kya hai? (By default single servlet instance multiple threads handle karta hai).
* Difference between `doGet()` and `doPost()` (jab `HttpServlet` padho tab important).
* Servlet mapping kaise hota hai? (web.xml ya annotation).
* Servlet container ka role kya hai?

---
