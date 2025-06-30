# 📘 Daily Git Documentation - 30 June 2025

## 👤 Author: Rahul Shinde

---

## ✅ Summary of Work Done

### 🧱 Folder Setup & Structuring

- Created a central folder: `Documentation`
- Added subfolders:
  - `DSA-Notes`
  - `Git-Commands`
  - `MongoDB-Query`
  - `Java-Core`
  - `JDBC-SQL`

---

### 📁 Folder Migrations

- Moved `README.md` file to `MongoDB-Query/`
- Moved `git-commands/` content into `Git-Commands/`
- Moved DSA folders (`Array`, `day 1`, `day-2`, `Patterns`, `Time Complexity`) into `DSA-Notes/`
- Renamed folders:
  - `Array` → `01-Array`
  - `day 1` → moved to `Java-Core`
  - `day-2 Patterns` → `02-Patterns` and moved to `Java-Core`
  - `time and space complexity` → `03-Time-Space-Complexity`
  - `dsa-apna-college` → `DSA-Notes`
  - `git-commands` → `Git-Commands`
  - `java-core` → `Java-Core`
  - `jdbc-sql` → `JDBC-SQL`

---

### ⚙️ Git Operations

- ✅ Added and committed all moved and renamed folders.
- ✅ Merged remote repo `dsa-apna-college` using:
  ```bash
  git remote add dsa <url>
  git fetch dsa
  git merge dsa/main --allow-unrelated-histories
  ```
- 🔁 Faced merge commit editor screen (solved using default `vim` by pressing `i`, writing message, then `Esc`, `:wq`)
- ⚠️ Faced "upstream gone" issue — skipped fixing as repo was local

---

### 🧹 Cleanup and Best Practices

- ❌ Removed all `.class` files using:
  ```bash
  git rm --cached -r *.class
  ```
- ✅ Created `.gitignore` file and added rule to ignore `.class` files
  ```gitignore
  *.class
  ```

---

## 🔁 Errors Faced & Fixes

| Error Message | Solution |
|---------------|----------|
| `LF will be replaced by CRLF` | Git warning — safe to ignore |
| `The system cannot find the file specified` | Checked folder names carefully using `dir /b /ad` |
| `Merge editor not closing` | Used `vim` commands: `i` → write → `Esc` → `:wq` |
| `nothing to commit, working tree clean` | Verified `git status` and re-added using `git add .` |
| `case-sensitive rename not recognized` | Temporary rename trick: rename to temp → rename back |

---

## 🚀 Final Structure Snapshot

```
Documentation/
├── DSA-Notes/
│   ├── 01-Array/
│   ├── day-2/
│   ├── 02-Patterns/
│   └── 03-Time-Space-Complexity/
├── Git-Commands/
├── MongoDB-Query/
├── Java-Core/
│   └── day-1/
├── JDBC-SQL/
└── README.md
```

---

## ✅ Git Final Push

```bash
git add .
git commit -m "Structured folders, removed .class files, added .gitignore"
git push origin main
```
