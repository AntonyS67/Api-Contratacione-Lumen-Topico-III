-- Categories
create table if not exists categories(
    id int(11) not null auto_increment,
    name varchar(50) not null,
    image varchar(255),
    created_at timestamp null,
    updated_at timestamp null,
    primary key(id)
);

-- Actividades
create table if not exists activities(
    id int(11) not null auto_increment,
    name varchar(50) not null,
    category_id int(11) not null,
    created_at timestamp null,
    updated_at timestamp null,
    primary key(id)
);

-- Tareas
create table if not exists tasks(
    id int(11) not null auto_increment,
    name varchar(255) not null,
    activity_id int(11) not null,
    created_at timestamp null,
    updated_at timestamp null,
    primary key(id)
);

-- Proveedores
create table if not exists providers(
    id int(11) not null auto_increment,
    name varchar(255) not null,
    city varchar(255) not null,
    district varchar(255) not null,
    comment varchar(255),
    image varchar(255),
    created_at timestamp null,
    updated_at timestamp null,
    primary key(id)
);

-- Proveedor - Tarea
create table if not exists providers_tasks(
    task_id int(11) not null,
    provider_id int(11) not null,
    cost decimal(8,2) not null,
    created_at timestamp null,
    updated_at timestamp null,
    primary key(task_id,provider_id)
);

-- Contratacion
create table if not exists hirings(
    id int(11) not null auto_increment,
    task_id int(11) not null,
    provider_id int(11) not null,
    address varchar(500) not null,
    start_date timestamp null,
    end_date timestamp null,
    start_time timestamp null,
    number_people int(5) not null,
    number_hours int(5) not null,
    total decimal(8,2) not null default 0.0,
    created_at timestamp null,
    updated_at timestamp null,
    primary key(id)
);
