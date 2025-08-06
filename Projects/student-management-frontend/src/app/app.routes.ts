import { Routes } from '@angular/router';
// Update the import path and class name to match the actual component file and export
// Update the import path and class name to match the actual component file and export
// Example: If the correct path is './signup/signup.component', use the following:
// Update the import path and class name to match the actual component file and export
// Example: If the correct path is './signup/signup.component.ts', use the following:
// Update the path below to the correct relative path and filename for your SignupComponent
// For example, if the file is named 'Signup.component.ts' in the 'signup' folder, use:
import { Signup } from './webapp/signup/signup.component'; // filepath: src/app/app.routes.ts
// Or, if the file is in a different folder or has a different name, update accordingly.
// import { SignupComponent } from './correct-folder/correct-file-name';

export const routes: Routes = [
    { path: 'signup', component: Signup },
    { path: '', redirectTo: 'signup', pathMatch: 'full'}
];
