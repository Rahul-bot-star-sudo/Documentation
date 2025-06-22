# Git-commands
Her we see all command to use in dailly life.

<!-- Git Merge Command -->
<div style="font-family: Arial, sans-serif; font-size: 16px; color: #333;">
  <h2 style="color: #2c3e50;">🔀 git merge</h2>

  <p>The <code>git merge</code> command is used to combine the work from one branch into another.</p>

  <h3>✅ Example: Merge dev into main</h3>
  <pre style="background-color: #f4f4f4; padding: 10px;">
git checkout main
git merge dev
  </pre>

  <h3>⚠️ Handling Merge Conflicts</h3>
  <ul>
    <li>Open conflicting files and fix the code</li>
    <li>Then run:
      <pre>git add .</pre>
      <pre>git commit -m "Resolved conflict"</pre>
    </li>
  </ul>

  <h3>🧹 Clean Up</h3>
  <pre>git branch -d dev</pre>

  <p>Merging helps you bring together changes after working on features or fixes in separate branches.</p>
</div>


<!-- Git Branch Command -->
<div style="font-family: Arial, sans-serif; font-size: 16px; color: #333;">
  <h2 style="color: #2c3e50;">🌿 git branch</h2>
<h4>ye error ata hai agar branch name change ho to</h4>
  <h5>
    PS C:\Users\rahul\OneDrive\Desktop\core java\day-1> git push origin main
error: src refspec main does not match any
error: failed to push some refs to 'origin'
  </h5>
  <p>The <code>git branch</code> command is used to manage branches in Git. A branch lets you work on new features without affecting the main code.</p>

  <h3>🔹 View All Branches:</h3>
  <pre style="background-color: #f4f4f4; padding: 10px;">git branch</pre>

  <h3>🔹 Create a New Branch:</h3>
  <pre style="background-color: #f4f4f4; padding: 10px;">git branch dev</pre>

  <h3>🔹 Switch to a Branch:</h3>
  <pre style="background-color: #f4f4f4; padding: 10px;">git checkout dev</pre>

  <h3>🔹 Rename Current Branch:</h3>
  <pre style="background-color: #f4f4f4; padding: 10px;">git branch -m main</pre>

  <h3>🔹 Delete a Branch:</h3>
  <pre style="background-color: #f4f4f4; padding: 10px;">git branch -d dev</pre>

  <p>Use branches to safely develop features, fix bugs, or experiment — all without touching your main project.</p>
</div>


<!-- git remote add Command -->
<div style="font-family: Arial, sans-serif; font-size: 16px; color: #333;">
  <h2 style="color: #2c3e50;">🔗 git remote add</h2>

  <p>The <code>git remote add</code> command links your local repository to a remote server like GitHub.</p>

  <h3>🔹 Syntax:</h3>
  <pre style="background-color: #f4f4f4; padding: 10px;">
git remote add origin &lt;repository-url&gt;
  </pre>

  <h3>🔹 Example:</h3>
  <pre style="background-color: #f4f4f4; padding: 10px;">
git remote add origin https://github.com/rahul/my-project.git
  </pre>

  <h3>🔎 Check Remote:</h3>
  <pre style="background-color: #f4f4f4; padding: 10px;">
git remote -v
  </pre>

  <h3>❗ Reset Remote (if needed):</h3>
  <pre style="background-color: #f4f4f4; padding: 10px;">
git remote remove origin
git remote add origin &lt;new-url&gt;
  </pre>

  <p>This command is essential when you want to push your code to GitHub for the first time.</p>
</div>


<!-- mkdir Command Explanation -->
<div style="font-family: Arial, sans-serif; font-size: 16px; color: #333;">
  <h2 style="color: #2c3e50;">📁 mkdir Command</h2>

  <p>The <code>mkdir</code> command is used to create new folders (directories) from the terminal.</p>

  <h3>🔹 Syntax:</h3>
  <pre style="background-color: #f4f4f4; padding: 10px;">mkdir folder-name</pre>

  <h3>🔹 Example:</h3>
  <pre style="background-color: #f4f4f4; padding: 10px;">mkdir my-project</pre>

  <h3>✨ Advanced Usage:</h3>
  <ul>
    <li><code>mkdir folder1 folder2</code> → Creates multiple folders</li>
    <li><code>mkdir -p parent/child</code> → Creates nested folders</li>
  </ul>

  <p>This command is useful when starting new projects or organizing files.</p>
</div>


<!-- Successful Git Force Push -->
<div style="font-family: Arial, sans-serif; font-size: 16px; color: #333;">
  <h2 style="color: #2c3e50;">✅ git push --force: Success!</h2>

  <p>This command forcefully pushed the local repository to GitHub, replacing any existing remote content.</p>

  <pre style="background-color: #f4f4f4; padding: 10px;">
git push -u origin main --force
  </pre>

  <h3>⚠️ Use with caution:</h3>
  <ul>
    <li>✅ Safe for new personal projects</li>
    <li>❌ Avoid in team projects (may delete others’ work)</li>
  </ul>

  <p>Now your GitHub repo is perfectly synced with your local project!</p>
</div>


<!-- Git Init Command Explanation -->
<div style="font-family: Arial, sans-serif; font-size: 16px; color: #333;">
  <h2 style="color: #2c3e50;">Git Init Command</h2>

  <p>The <code>git init</code> command is used to create a new Git repository. This initializes your project folder so Git can start tracking changes.</p>

  <h3 style="color: #34495e;">🔹 Usage:</h3>
  <pre style="background-color: #f4f4f4; padding: 10px; border-left: 4px solid #007acc;">
git init
  </pre>

  <h3 style="color: #34495e;">🔹 What It Does:</h3>
  <ul style="line-height: 1.8;">
    <li>Creates a hidden <code>.git</code> folder inside your project.</li>
    <li>Marks the folder as a Git repository.</li>
    <li>Allows you to run other Git commands like <code>add</code>, <code>commit</code>, and <code>push</code>.</li>
  </ul>

  <p>After initializing, use <code>git status</code> to see the current state of your project.</p>
</div>


<!-- Git Push Command Explanation -->
<div style="font-family: Arial, sans-serif; font-size: 16px; color: #333;">
  <h2 style="color: #2c3e50;">Git Push Command</h2>

  <p>The <code>git push</code> command is used to upload your local commits to a remote repository like GitHub.</p>

  <h3 style="color: #34495e;">🔹 Usage:</h3>
  <pre style="background-color: #f4f4f4; padding: 10px; border-left: 4px solid #007acc;">
git push origin main
  </pre>

  <ul style="line-height: 1.6;">
    <li><strong>origin</strong> → The name of the remote (GitHub)</li>
    <li><strong>main</strong> → The branch name you’re pushing to</li>
  </ul>

  <h3 style="color: #34495e;">📌 Prerequisites:</h3>
  <ul>
    <li>Initialize repo with <code>git init</code></li>
    <li>Connect to GitHub with <code>git remote add origin &lt;repo-url&gt;</code></li>
    <li>Make commits before pushing</li>
  </ul>

  <p>After pushing, your code will appear on GitHub under the selected branch.</p>
</div>


<div style="font-family: Arial, sans-serif; font-size: 16px; color: #333;">
  <h2 style="color: #2c3e50;">Fix: Non-Fast-Forward Push Rejected</h2>

  <p>If Git rejects your push with a <strong>non-fast-forward</strong> error, it means your local branch is behind the remote branch.</p>

  <h3 style="color: #34495e;">🔧 Fix the Problem:</h3>

  <ol style="line-height: 1.8;">
    <li>Pull and merge changes from GitHub:
      <pre style="background-color: #f4f4f4; padding: 10px;">git pull origin main --allow-unrelated-histories</pre>
    </li>
    <li>If there are merge conflicts, resolve them manually.</li>
    <li>Then commit the merge and push again:
      <pre style="background-color: #f4f4f4; padding: 10px;">git add .<br>git commit -m "Resolve merge conflict"<br>git push origin main</pre>
    </li>
  </ol>

  <p>This allows you to sync with the remote repository and push your code successfully.</p>
</div>


<div style="font-family: Arial, sans-serif; font-size: 16px; color: #333;">
  <h2 style="color: #2c3e50;">Error: Not a Git Repository</h2>

  <p>If you see this error:</p>
  <pre style="background-color: #ffecec; padding: 10px; border-left: 4px solid red; border-radius: 5px;">
fatal: not a git repository (or any of the parent directories): .git
  </pre>

  <p>It means Git has not been initialized in the current folder.</p>

  <h3 style="color: #34495e;">✅ How to Fix It</h3>
  <ol style="line-height: 1.8;">
    <li>Go to your project folder:
      <pre style="background-color: #f4f4f4; padding: 5px;">cd your-folder-name</pre>
    </li>
    <li>Initialize a Git repository:
      <pre style="background-color: #f4f4f4; padding: 5px;">git init</pre>
    </li>
    <li>Now check status again:
      <pre style="background-color: #f4f4f4; padding: 5px;">git status</pre>
    </li>
  </ol>
</div>


<div style="font-family: Arial, sans-serif; font-size: 16px; color: #333;">
  <h2 style="color: #2c3e50;">Add and Commit Files in Git</h2>

  <p>After you initialize a Git repository, files and folders will appear as <strong>untracked</strong>.</p>

  <h3 style="color: #34495e;">🔹 Step 1: Add files to staging area</h3>
  <pre style="background-color: #f4f4f4; padding: 10px; border-left: 4px solid #007acc;">
git add git-commands
  </pre>

  <p>This tells Git to track the <code>git-commands</code> folder and prepare it for commit.</p>

  <h3 style="color: #34495e;">🔹 Step 2: Commit the files</h3>
  <pre style="background-color: #f4f4f4; padding: 10px; border-left: 4px solid #27ae60;">
git commit -m "Initial commit with git-commands folder"
  </pre>

  <p>This creates a snapshot of the added files in the Git history.</p>
</div>


<div style="font-family: Arial, sans-serif; font-size: 16px; color: #333;">
  <h2 style="color: #2c3e50;">Navigate Folders using <code>cd</code></h2>

  <p>The <code>cd</code> command is used in Git Bash (and Linux terminals) to move between folders (directories).</p>

  <h3 style="color: #34495e;">🔹 Syntax</h3>
  <pre style="background-color: #f4f4f4; padding: 10px; border-left: 4px solid #007acc; border-radius: 5px;">
cd foldername
  </pre>

  <h3 style="color: #34495e;">🔹 Examples</h3>
  <pre style="background-color: #f4f4f4; padding: 10px; border-left: 4px solid #27ae60; border-radius: 5px;">
cd Documents
cd ..
cd ~
  </pre>

  <ul style="line-height: 1.6;">
    <li><code>cd Documents</code> — Go inside the Documents folder</li>
    <li><code>cd ..</code> — Move up one level (to parent folder)</li>
    <li><code>cd ~</code> — Go to home directory</li>
  </ul>
</div>


<div style="font-family: Arial, sans-serif; font-size: 16px; color: #333;">
  <h2 style="color: #2c3e50;">Clone a Git Repository</h2>

  <p>The <code>git clone</code> command is used to copy a Git repository from a remote server (like GitHub) to your local machine.</p>

  <h3 style="color: #34495e;">🔹 Syntax</h3>
  <pre style="background-color: #f4f4f4; padding: 10px; border-left: 4px solid #007acc; border-radius: 5px;">
git clone &lt;repository-url&gt;
  </pre>

  <h3 style="color: #34495e;">🔹 Example</h3>
  <pre style="background-color: #f4f4f4; padding: 10px; border-left: 4px solid #27ae60; border-radius: 5px;">
git clone https://github.com/octocat/Hello-World.git
  </pre>

  <p>This will download the <code>Hello-World</code> repository into your current folder.</p>

  <p>You can now open the folder, view files, and start working on the project locally.</p>
</div>


<div style="font-family: Arial, sans-serif; font-size: 16px; color: #333;">
  <h2 style="color: #2c3e50;">Set VS Code as Git's Default Editor</h2>

  <p>
    You can configure Git to use <strong>Visual Studio Code</strong> as the default text editor using the command below:
  </p>

  <pre style="background-color: #f4f4f4; padding: 10px; border-left: 4px solid #007acc; border-radius: 5px;">
git config --global core.editor "code --wait"
  </pre>

  <h3 style="color: #34495e;">🧠 What This Does:</h3>
  <ul style="line-height: 1.6;">
    <li><code>core.editor</code> tells Git which editor to use for commit messages, merge conflicts, etc.</li>
    <li><code>code</code> runs Visual Studio Code.</li>
    <li><code>--wait</code> tells Git to wait until you close VS Code before continuing.</li>
  </ul>

  <p>
    This is especially useful if you want to write commit messages or resolve merge conflicts using the full power of VS Code.
  </p>

  <h3 style="color: #34495e;">✅ To Verify:</h3>
  <pre style="background-color: #f4f4f4; padding: 10px; border-left: 4px solid #27ae60; border-radius: 5px;">
git config --global --list
  </pre>

  <p>If you see <code>core.editor=code --wait</code> in the list, it's successfully configured.</p>
</div>


<div style="font-family: Arial, sans-serif; font-size: 16px; color: #333;">
  <h2 style="color: #2c3e50;">Set VS Code as Default Git Editor</h2>

  <p>The following command sets Visual Studio Code as your default editor for Git operations:</p>

  <pre style="background-color: #f4f4f4; padding: 10px; border-left: 4px solid #007acc;">
git config --global core.editor "code --wait"
  </pre>

  <p><code>--wait</code> ensures Git pauses until you finish writing your message and close VS Code.</p>

  <p>After setting this, Git will launch VS Code for tasks like writing commit messages.</p>
</div>


<div style="font-family: Arial, sans-serif; font-size: 16px; color: #333;">
  <h2 style="color: #2c3e50;">View Global Git Configuration</h2>

  <p>The <code>git config --global --list</code> command displays all the global configuration settings you've set in Git.</p>

  <h3 style="color: #34495e;">🔹 Usage</h3>
  <pre style="background-color: #f4f4f4; padding: 10px; border-left: 4px solid #007acc;">
git config --global --list
  </pre>

  <p>Example output:</p>
  <pre style="background-color: #f4f4f4; padding: 10px; border-left: 4px solid #27ae60;">
user.name=Your Name
user.email=you@example.com
core.editor=code --wait
  </pre>
</div>


<div style="font-family: Arial, sans-serif; font-size: 16px; color: #333;">
  <h2 style="color: #2c3e50;">Configure Git Globally</h2>
  
  <p>The <code>git config --global</code> command is used to set Git configuration values that apply to all your Git projects on your system.</p>

  <h3 style="color: #34495e;">🔹 Set User Name</h3>
  <pre style="background-color: #f4f4f4; padding: 10px; border-left: 4px solid #007acc;">
git config --global user.name "Your Name"
  </pre>

  <h3 style="color: #34495e;">🔹 Set User Email</h3>
  <pre style="background-color: #f4f4f4; padding: 10px; border-left: 4px solid #007acc;">
git config --global user.email "you@example.com"
  </pre>

  <p>Once set, Git will use this name and email in all commits across your system.</p>
</div>


<div style="font-family: Arial, sans-serif; font-size: 16px; color: #333;">
  <h2 style="color: #2c3e50;">Show Current Directory with <code>pwd</code></h2>
  
  <p>The <code>pwd</code> command is used to display the full path of the current working directory in the terminal.</p>
  
  <h3 style="color: #34495e;">🔹 Usage</h3>
  <pre style="background-color: #f4f4f4; padding: 10px; border-left: 4px solid #007acc;">
pwd
  </pre>

  <p>Example output:</p>
  <pre style="background-color: #f4f4f4; padding: 10px; border-left: 4px solid #27ae60;">
/home/user/Desktop/my-folder
  </pre>
</div>


<div style="font-family: Arial, sans-serif; font-size: 16px; color: #333;">
  <h2 style="color: #2c3e50;">Clear Terminal Screen</h2>
  
  <p>The <code>clear</code> command is used to clean the terminal window by removing all previous outputs.</p>

  <h3 style="color: #34495e;">🔹 Usage</h3>
  <pre style="background-color: #f4f4f4; padding: 10px; border-left: 4px solid #007acc;">
clear
  </pre>

  <p>You can also use the keyboard shortcut <kbd>Ctrl</kbd> + <kbd>L</kbd> in most terminals.</p>
</div>

<div style="font-family: Arial, sans-serif; font-size: 16px; color: #333;">
  <h2 style="color: #2c3e50;">Check Git Version</h2>
  <p style="margin: 10px 0;">
    To check the version of Git installed on your system, use the following command:
  </p>
  <pre style="background-color: #f4f4f4; padding: 10px; border-left: 4px solid #007acc; color: #000;">
git --version
  </pre>
</div>

<div style="font-family: Arial, sans-serif; font-size: 16px; color: #333;">
  <h2 style="color: #2c3e50;">Download Git Bash</h2>
  <p style="margin-bottom: 10px;">
    To use Git on your system, you need to install Git Bash. Click the link below to download it:
  </p>
  <a href="https://git-scm.com/downloads" target="_blank" 
     style="display: inline-block; background-color: #28a745; color: white; padding: 10px 15px; 
            text-decoration: none; border-radius: 5px;">
    Download Git Bash
  </a>
</div>

<div style="font-family: Arial, sans-serif; font-size: 16px; color: #333;">
  <h2 style="color: #2c3e50;">List Files and Directories using <code>ls</code></h2>
  
  <p>The <code>ls</code> command is used to list files and directories in the current working directory.</p>
  
  <h3 style="color: #34495e;">🔹 Basic Usage</h3>
  <pre style="background-color: #f4f4f4; padding: 10px; border-left: 4px solid #007acc;">
ls
  </pre>
  
  <h3 style="color: #34495e;">🔹 Common Options</h3>
  <ul style="line-height: 1.6;">
    <li><code>ls -l</code> — Shows detailed info (permissions, size, date)</li>
    <li><code>ls -a</code> <code>ls -Force
</code> — Shows hidden files (those starting with <code>.</code>)</li>
    <li><code>ls -la</code> — Combines <code>-l</code> and <code>-a</code></li>
    <li><code>ls -lh</code> — Shows human-readable file sizes</li>
    <li><code>ls foldername/</code> — Lists contents of a specific folder</li>
  </ul>

  <h3 style="color: #34495e;">🔍 Example</h3>
  <pre style="background-color: #f4f4f4; padding: 10px; border-left: 4px solid #27ae60;">
ls -la
  </pre>
</div>


