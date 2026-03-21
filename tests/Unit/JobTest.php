<?php

test('it belongs to an employer', function () {


   //Arrange
   $employer = \App\Models\Employer::factory()->create();
    $job = \App\Models\Job::factory()->create([
        'employer_id' => $employer->id,
    ]);

   //Act
   
   //Assert
   expect($job->employer->is($employer))->toBeTrue();
});


it('can have tags' , function () {
    //Arrange
    $job = \App\Models\Job::factory()->create();

    $job->tag('Frontend');

    expect($job->tags)->toHaveCount(1);
});
