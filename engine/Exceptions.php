<?php

// Для того, чтобы различать откуда какой Exception прилетает -
//       - иерархично наследуемся от базового класса исключений

class RoutingException extends Exception {}
class DataBaseException extends Exception {}
class SessionException extends Exception {}