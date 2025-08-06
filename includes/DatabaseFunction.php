<?php 
function Query($pdo, $sql, $parameters=[]) {
    $query = $pdo->prepare($sql);
    $query->execute($parameters);
    return $query;
}

// Total 
function totalQuestions($pdo) {
    $query = Query($pdo, 'SELECT COUNT(*) FROM questions');
    $row = $query->fetch();
    return $row[0];
}

function totalModules($pdo){
    $query = Query($pdo, 'SELECT COUNT(*) FROM modules');
    $row = $query->fetch();
    return $row[0];
}

function totalUsers($pdo){
    $query = Query($pdo, 'SELECT COUNT(*) FROM users');
    $row = $query->fetch();
    return $row[0];
}

function totalContacts($pdo){
    $query = Query($pdo, 'SELECT COUNT(*) FROM contacts');
    $row = $query->fetch();
    return $row[0];
}
// List function, Select
function listQuestions($pdo) {
    $sql = Query($pdo, 'SELECT Title, content, questiondate, image,  questionid, modules.Modulename, questions.userID, users.username, users.email FROM questions INNER JOIN modules ON questions.ModuleID = modules.ModuleID INNER JOIN users ON questions.userID = users.userID');
    return $sql->fetchAll(); 
} 
function listUsers($pdo) {
    $sql = Query($pdo, 'SELECT username, email, location, userID FROM users');
    return $sql->fetchAll();
}
function listModules($pdo) {
    $sql = Query($pdo, 'SELECT Modulename, ModuleID FROM modules ');
    return $sql->fetchAll();
}
function ListEmail($pdo) {
    $sql = Query($pdo, 'SELECT content, emaildate, contactID, users.userID, users.username, users.email FROM contacts INNER JOIN users ON contacts.userID = users.userID' );
    return $sql->fetchAll();
}

function getUserByID($pdo, $userID) {
    $parameters = [':userID' => $userID];
    $sql = Query($pdo, 'SELECT userID, username, email, location, role FROM users WHERE userID = :userID', $parameters);
    return $sql->fetch();
}

function GetModules($pdo, $ModuleID) {
    $parameters = [':ModuleID' => $ModuleID];
    $sql = Query($pdo, 'SELECT ModuleID, Modulename FROM modules WHERE ModuleID = :ModuleID', $parameters);
    return $sql->fetch();
}

function GetAllModules($pdo) {
    $sql = Query($pdo, 'SELECT ModuleID, Modulename FROM modules');
    return $sql->fetchAll();
}

function GetAllUsers($pdo) {
    $sql = Query($pdo, 'SELECT userID, username FROM users');
    return $sql->fetchAll();
}

function GetUser($pdo, $userID, $username, $email, $location, $password) {
    $parameters = ['userID' => $userID, 'username' => $username, 'email' => $email, 'password' => $password];
    $sql = Query($pdo, 'SELECT userID, username, email, password FROM users WHERE userID = :userID', $parameters);
}

function GetUsers($pdo, $userID) {
    $parameters = ['userID' => $userID];
    $sql = Query($pdo, 'SELECT *  FROM users WHERE userID = :userID', $parameters);
    return $sql->fetch();
}

function GetQuestion($pdo, $questionID) {
    $parameters = [':questionID' => $questionID];
    $sql = Query($pdo, 'SELECT * FROM questions WHERE questionID = :questionID', $parameters);
    return $sql->fetch();
}

function GetQuestionByUser($pdo, $userID) {
    $parameters = ['userID' => $userID];
    $sql = Query($pdo, 'SELECT * FROM questions WHERE userID = :userID', $parameters);
    return $sql->fetchAll();
}
// Add function, Insert into
function addContent($pdo, $Title, $content, $fileToUpload, $userID, $ModuleID) { 
    $parameters = [':Title' => $Title ,':content' => $content, ':fileToUpload' => $fileToUpload, ':userID' => $userID, ':ModuleID' => $ModuleID];
    $sql = Query($pdo, 'INSERT INTO questions(Title, content, `image`, questiondate, userID, ModuleID) VALUES (:Title, :content, :fileToUpload, CURDATE(), :userID, :ModuleID)', $parameters);
}

function addModule($pdo, $ModuleName) {
    $parameters = [':ModuleName' => $ModuleName];
    $sql = Query($pdo, 'INSERT INTO modules(Modulename) VALUES (:ModuleName)', $parameters);
}

function SendEmail($pdo, $content, $userID) {
    $parameters = ['content' => $content, 'userID' => $userID];
    $sql = Query($pdo, 'INSERT INTO contacts(content, emaildate, userID) VALUES (:content, CURDATE(), :userID)', $parameters);
}

// Delete function, Delete
function DeleteQuestion($pdo) {
    $parameters = [':questionid' => $_POST['questionid']];
    $sql = Query($pdo, 'DELETE FROM questions WHERE questionid = :questionid', $parameters);
    return $sql;
}

function DeleteUser($pdo, $userID) {
    Query($pdo, 'DELETE FROM contacts WHERE userID = :userID', [':userID' => $userID]);
    Query($pdo, 'DELETE FROM users WHERE userID = :userID', [':userID' => $userID]);
}


function DeleteModule($pdo) {
    $parameters = [':ModuleID' => $_POST['ModuleID']];
    $sql = Query($pdo, 'DELETE FROM modules WHERE ModuleID = :ModuleID', $parameters);
    return $sql;
}

function DeleteMail($pdo) {
    $parameters = [':contactID' => $_POST['contactID']];
    $sql = Query($pdo, 'DELETE FROM contacts WHERE contactID = :contactID', $parameters);
    return $sql;
}
// Edit function, Update

function EditQuestion($pdo, $Title, $content, $fileToUpload, $ModuleID, $questionID, $userID) {
    $parameters = [':Title' => $Title, ':content' => $content, ':fileToUpload' => $fileToUpload,':ModuleID' => $ModuleID, ':id' => $questionID, ':userID' => $userID];
    $sql = Query($pdo, 'UPDATE questions SET  Title = :Title, content = :content, image = :fileToUpload, ModuleID = :ModuleID, userID = :userID WHERE questionID = :id', $parameters);
}

function editModule($pdo, $Modulename, $ModuleID) {
    $parameters = [':Modulename' => $Modulename, ':ModuleID' => $ModuleID];
    $sql = Query($pdo,'UPDATE modules SET Modulename = :Modulename WHERE ModuleID = :ModuleID',$parameters);
}

function editProfile($pdo, $username, $email, $location, $password, $userID) {
    $parameters = ['username' => $username, 'email' => $email, 'location' => $location, 'password' => $password, 'userID' => $userID];
    $sql = Query($pdo, 'UPDATE users SET username = :username, email = :email, location = :location, password = :password WHERE userID = :userID', $parameters);
}
// Login/Signup

function Login($pdo, $email) {
    $parameters = [':email' => $email];
    $sql = Query($pdo, 'SELECT * FROM users WHERE email = :email', $parameters);
    return $sql->fetch();
}

function SignUp($pdo, $username, $email, $location, $password) {
    $parameters = ['username' => $username, 'email' => $email, 'location' => $location, 'password' => $password];
    $sql = Query($pdo, 'INSERT INTO users (username, email, location, password) VALUES (:username, :email, :location, :password)' ,$parameters);
}

// other function

function countQuestions($pdo, string $search = ''): int {
    if ($search !== '') {
        $sql = '
          SELECT COUNT(*) 
          FROM questions q
          WHERE q.Title   LIKE :kw
             OR q.content LIKE :kw
        ';
        $params = [':kw' => "%{$search}%"];
        return (int) Query($pdo, $sql, $params)->fetchColumn();
    }
    return (int) Query($pdo, 'SELECT COUNT(*) FROM questions')->fetchColumn();
}

function fetchQuestions($pdo, string $search = ''): array {
    if ($search !== '') {
        $sql = '
          SELECT q.*, questionid, u.username, m.Modulename
          FROM questions q
          JOIN users   u ON q.userID   = u.userID
          JOIN modules m ON q.ModuleID = m.ModuleID
          WHERE q.Title   LIKE :kw
             OR q.content LIKE :kw OR u.username LIKE :kw
          ORDER BY q.questiondate DESC
        ';
        $params = [':kw' => "%{$search}%"];
        return Query($pdo, $sql, $params)->fetchAll(PDO::FETCH_ASSOC);
    }
    
    $sql = '
      SELECT q.*, questionid, u.username, m.Modulename
      FROM questions q
      JOIN users   u ON q.userID   = u.userID
      JOIN modules m ON q.ModuleID = m.ModuleID
      ORDER BY q.questiondate DESC
    ';
    return Query($pdo, $sql)->fetchAll(PDO::FETCH_ASSOC);
}



