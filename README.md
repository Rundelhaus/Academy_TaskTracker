Application made with Laravel framework v 7.21

Requires:

    PHP 7.4(and later versions)
    PHP composer
  also uses:
  
    PostgreSQL 12.2
    nginx 1.18
    nginx-unit



API List:

    domain.example/api/list                                     - get, list of TaskLists
    domain.example/api/list/{list_id}                           - get, returns certain TaskList
    domain.example/api/list/                                    - post, input new TaskList
    domain.example/api/list/                                    - patch, updates current TaskList
    domain.example/api/list/                                    - delete, deletes certain TaskList
    domain.example/api/list/{list_id}/tasks                     - get, list of Tasks
    domain.example/api/list/{list_id}/tasks/{task_id}           - patch, updates current Task
    domain.example/api/list/{list_id}/tasks/{task_id}/done      - patch, marks current Task as finished
    domain.example/api/list/{list_id}/tasks/{task_id}/          - delete, deletes current Task

