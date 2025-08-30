### flow of add Cookie using servlet
* response me ek cookie bhejo:
```servlet
Cookie ck = new Cookie ("username","rahul");
response.addCookie(ck);
```
* Request se cookies le kar print karo
```java
Cookie[] cookies = request.getCookies();
for(Cookie c: cookies){
  out.println(c.getName() + " : " + c.getValue());
}
```
* session banao aur value stare karo
```java
 HttpSession session = request.getSession();
 session.setAttribute("user", "rahul");
 out.println("Session created and user stored!");

```
* Session value padhkar print karo
```java
HttpSession session = request.getSession(false);
String user = (String) session.getAttribute("user");
out.println("Hello, " + user);
```
