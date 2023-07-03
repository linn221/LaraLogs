### Functions
* [x] migration table category, logs
* [x] CRUD category, CRUD logs
* [x] validation, repopulation, error messages
* [x] relationship, ($log->category instead of $log->category_id)
* [x] seeding
* [ ] don't give guest users write access to resources

### Refactor
* [ ] Eager loading for category of log

### Features
* [!] pagination
* [x] filter by category
* [x] search
* [x] add status
* [!] order by column
* [ ] fileter by updated, created date
* [ ] sort by id, updated, created, title
* [ ] sort by id, updated, created, title (for category)
* [ ] soft deleting, have a bin for admin to recycle or permentally delete
* [ ] deleting a category will give an option to delete related logs, or put them into archived
* [ ] add tags, of course
* [ ] add pictures
* [ ] add slug
* [ ] add visitors

### Bugs
* [x] bootstrap-icons not working
        (add '.css' extension at import statement)
* [!] url queries not including multiple values

### UI 
* [x] show validation errors
* [x] view files for category
* [x] view files for logs
* [x] show something for empty cases
* [x] autofocus input
* [x] convert select box to radio buttons (selecting category)
* [x] clicking a category will go to log listing page, filtered by that selected category
* [x] icons instead of dumb text
* [ ] pagination links at the top, aligned right with search bar
* [ ] inform how many items are found with search
* [ ] don't let guest users see admin tasks