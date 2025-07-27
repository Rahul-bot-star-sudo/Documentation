[⬅️ Back to Progress Table](../Covered%20consepts.md#tech-progress-tracker)
```md
[Link Text](file-path.md#heading)
```

---

## ✅ Markdown File Linking – Cheat Sheet

| **Use Case**                      | **Syntax**                                 | **Explanation**                                  |
| --------------------------------- | ------------------------------------------ | ------------------------------------------------ |
| Internal file link                | `[Go to Notes](notes.md)`                  | Same folder me `notes.md` file open karega.      |
| Link to heading in same file      | `[Go to Section](#section-name)`           | `#section-name` lowercase, space → `-` (hyphen). |
| Link to heading in other file     | `[Go to Concept](concepts.md#java-basics)` | Dusri file ke specific heading par jump karega.  |
| Go up one folder and link         | `[Back](../index.md)`                      | Parent folder me jaake file open karega.         |
| Go up two folders                 | `[Back](../../README.md)`                  | Grandparent folder ke file ko open karega.       |
| Folder ke andar kisi file ka link | `[View Note](folder-name/file.md)`         | Sub-folder me kisi file ka link.                 |
| Image add karna                   | `![Alt Text](image.png)`                   | Markdown me image embed karne ke liye.           |

---

## 🧪 Examples

### 1. Same folder me file:

```md
[Go to Covered Concepts](Covered-concepts.md)
```

### 2. Upar ke folder me jaake:

```md
[⬅️ Back to Main Table](../Covered-concepts.md#tech-progress-tracker)
```

### 3. Heading ke link ke liye:

Agar heading hai:

```md
## Java Basics
```

To link banega:

```md
[Jump to Java Basics](#java-basics)
```

Heading me **spaces ko `-`**, aur **uppercase → lowercase** karna hota hai.

---
