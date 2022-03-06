---

# Request PHP

A Curl Wrapper that mimics the Request package in Dart or Python.

---

## Add to your project.

Clone the git repo into your libs folder then done.

---

## Usage

```php

$res = Msibi_PHP\Request::get('https://jsonplaceholder.typicode.com/posts');
print_r($res); // stdClass Object ( [userId] => 1 [id] => 1 [title] => delectus aut autem [completed] => )

$res = Msibi_PHP\Request::post('https://jsonplaceholder.typicode.com/posts', '', ['userId' => 1, 'id' => 122, 'title' => 'Test', 'body' => 'Teast body' ]);

print_r($res); // stdClass Object ( [userId] => 1 [id] => 101 [title] => Test [body] => Teast body ) 

````

## Contributions

PRs are allowed.
