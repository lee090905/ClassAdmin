<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class SchoolClassesTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('school_classes');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
        $this->belongsTo('Teachers', [
            'foreignKey' => 'teacher_id'
        ]);

        $this->addBehavior('Timestamp');

        $this->hasMany('Students', [
        'foreignKey' => 'school_class_id',
    ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('name')
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->integer('teacher_id')
            ->requirePresence('teacher_id', 'create')
            ->notEmptyString('teacher_id');

        $validator
            ->integer('student_count')
            ->allowEmptyString('student_count')
            ->notEmptyString('student_count');

        return $validator;
    }
}
