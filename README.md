# fzb-framework
Simple PHP application framework

FZB Framework is a lightweight web framework that implements modern PHP 8.1 features. It provides a router, input validator, template renderer, DB abstration layer, and lightweight ORM. It currently is designed as a drop-in framework for deploying on shared/dedicated Apache servers, but will eventually include the ability to be run as a stand-alone application server.

Note: "fzb-framework" is a work-in-progress collection of test cases.  In the future it will give the developer the ability to start a new web project with a git clone, and will feature several sample project structures.

**Installation (dev server, linux)**

1. cd to your desired folder
2. git clone https://github.com/foozbat/fzb-framework.git
3. cd to project folder
4. composer update
5. php -S localhost:8000

**Installation (Apache, linux)**
1. cd to your web root
2. git clone https://github.com/foozbat/fzb-framework.git into webroot or desired subfolder
3. cd to project folder
4. composer update

**Installation (nginx, linux)**
1. cd to your web root
2. git clone https://github.com/foozbat/fzb-framework.git into webroot or desired subfolder
3. cd to project folder
4. composer update
5. Enable nginx url-rewriting by adding the following to your project's nginx configuration:
```
location / {
    try_files $uri $uri/ /index.php?$query_string;
}
```