# 📚 Centralized Documentation Repository

### 🧠 Author: [Rahul](https://github.com/Rahul-bot-star-sudo)  
### 📅 Date: 30 June 2025  

This repository combines 5 different repositories into one centralized documentation project for easier access and long-term maintenance.

---

## 📂 Merged Repositories

| Repository Name | Folder in This Repo |
|-----------------|---------------------|
| `-MongoDB-Query` | `MongoDB-Query/` |
| `dsa-apna-college` | `dsa-apna-college/` |
| `jdbc-sql` | `jdbc-sql/` |
| `java-core` | `java-core/` |
| `git-commands` | `git-commands/` |

---

## 🛠️ Merge Process Overview

### ✅ Steps Followed:

1. Cloned this `Documentation` repo.
2. Added remote for each old repo using:
   ```bash
   git remote add <name> <repo-url>
   git fetch <name>
   git merge <name>/main --allow-unrelated-histories
Resolved merge conflicts (mostly in README.md).

Moved all files into separate folders using:

bash
Copy
Edit
mkdir <repo-name>
for %f in (*) do move "%f" <repo-name>\
git add .
git commit -m "Moved files to <repo-name> folder"
git remote remove <name>
Pushed everything to GitHub using:

bash
Copy
Edit
git push origin main
⚠️ Common Issues & Solutions
Problem	Fix
Merge conflict in README.md	Manually edit and resolve
Vim editor opens	Wrote message, then :wq to exit
Remote already exists	git remote remove <name>
File move error on Windows	Used for %f in (*) do move
Upstream warning	git branch --set-upstream-to=origin/main

🧹 Cleanup
✅ All 5 original repositories were deleted after merging.

Now everything is maintained under one single repo for easy management.

📁 Final Folder Structure
graphql
Copy
Edit
Documentation/
├── MongoDB-Query/
├── dsa-apna-college/
├── jdbc-sql/
├── java-core/
├── git-commands/
🏁 Conclusion
Successfully merged and cleaned up 5 separate GitHub repositories into a centralized knowledge hub.

This was a professional-level Git task involving remotes, merges, conflict resolution, folder structure, and push management.
