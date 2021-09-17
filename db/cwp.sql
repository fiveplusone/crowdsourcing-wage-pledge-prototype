create table user (
  id int unsigned not null auto_increment primary key,
  username varchar(255),
  created_at datetime,
  updated_at datetime,
  email text,
  password varchar(255),
  email_verified bool,
  email_verified_at datetime,
  email_verification_code varchar(255),
  firstname text,
  lastname text,
  secondary_email text,
  secondary_email_verified bool,
  secondary_email_verified_at datetime,
  secondary_email_verification_code varchar(255),
  tel varchar(255),
  institution text,
  inst_city text,
  inst_country text,
  inst_role text,
  other_institutions_and_roles text,
  notes text
);

create table pledge (
  id int unsigned not null auto_increment primary key,
  longid text,
  user_id int,
  created_ip varchar(255),
  last_updated_ip varchar(255),
  project_name text,
  mturk_requester_name text,
  mturk_requester_id varchar(255),
  project_start_date datetime,
  project_end_date datetime,
  wage_target decimal(6,2),
  task_percentage_for_wage_target int,
  wage_floor decimal(6,2),
  task_percentage_for_wage_floor int,
  rejection_policy text,
  target_wage_understand_checkbox bool,
  rejection_policy_checkbox bool,
  compliance_process_checkbox bool,
  created_at datetime,
  updated_at datetime,
  status varchar(255),
  published_at datetime
);

create table pledge_collaborator (
  id int unsigned not null auto_increment primary key,
  pledge_id int,
  collaborator_email text,
  collaborator_user_id int,
  collaborator_role varchar(255),
  created_by_user_id int,
  created_at datetime,
  updated_at datetime
);

create table inquiry (
  id int unsigned not null auto_increment primary key,
  longid varchar(255),
  name varchar(255),
  email varchar(255),
  tel varchar(255),
  mturk_worker_id varchar(255),
  country varchar(255),
  requester text,
  mturk_requester_id varchar(255),
  task_info text,
  inquiry_about varchar(255),
  task_completed_date varchar(255),
  inquiry_arising_date varchar(255),
  inquiry_description text,
  contacted_req varchar(255),
  req_contact_info text,
  created_ip varchar(255),
  inquiry_status varchar(255),
  created_at datetime,
  updated_at datetime
);


