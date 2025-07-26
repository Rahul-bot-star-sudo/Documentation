# git add command
```
git add file1.md file2.md file3.md
git commit -m "Added 3 files"
git push
```

### ✅ `git add` Command Explained (in Hindi-friendly Simple Terms)

---

## 🔧 **Git Add Kya Karta Hai?**

`git add` command ka use hota hai **file(s) ko staging area me daalne ke liye** – yaani aap Git ko batate ho:

> "Mujhe ye file commit karni hai."

---

## 🧪 **Basic Syntax**

```bash
git add <filename>
```

### 📌 Example:

```bash
git add index.html
```

👉 Iska matlab hai: `index.html` file staging area me chali gayi.

---

## 🔥 Common Commands:

| Command                | Use                                                |
| ---------------------- | -------------------------------------------------- |
| `git add .`            | 🔄 Saari **current folder** ki files ko stage karo |
| `git add -A`           | 🔄 All changes (new, modified, deleted) stage karo |
| `git add -u`           | 🔄 Sirf **modified & deleted** files stage karo    |
| `git add *.html`       | 🔄 Sirf HTML files stage karo                      |
| `git add folder-name/` | 🔄 Pure folder ke files ko stage karo              |

---

## 🔍 Check karne ke liye:

```bash
git status
```

> Ye batayega kaunsi files **staged** hain, kaunsi **unstaged** hain.

---

## 🚀 Example Workflow:

```bash
git init                     # repo initialize karo
git add .                   # saari files stage karo
git commit -m "First commit" # commit karo
git push origin main         # GitHub pe bhejo
```

---
