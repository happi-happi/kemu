<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lessonplanstdiiitostdvi extends Model
{
    use HasFactory;

      /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'lessonplanstdiiitostdvi';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'staff_id',
        'school_id',
        'class',
        'date',
        'subject_id',
        'registeredgirls',
        'registeredboys',
        'presentgirls',
        'presentboys',
        'maincompetence',
        'specificcompetence',
        'mainactivity',
        'specificactivity',
        'teachingandlearningresources',
        'references',
        'IntroductionTime',
        'IntroductionTeachingActivities',
        'IntroductionLearningActivities',
        'IntroductionAssessmentCriteria',
        'CompetenceDevelopementTime',
        'CompetenceDevelopementTeachingActivities',
        'CompetenceDevelopementLearningActivities',
        'CompetenceDevelopementAssessmentCriteria',
        'DesignTime',
        'DesignTeachingActivities',
        'DesignLearningActivities',
        'DesignAssessmentCriteria',
        'RealisationTime',
        'RealisationTeachingActivities',
        'RealisationLearningActivities',
        'RealisationAssessmentCriteria',
        'Remarks',
    ];

    /**
     * Get the staff associated with the lesson plan.
     */
    public function staff()
    {
        return $this->belongsTo(staff::class, 'staff_id');
    }

    /**
     * Get the subject associated with the lesson plan.
     */
    public function subject()
    {
        return $this->belongsTo(subjects::class, 'subject_id');
    }
}
