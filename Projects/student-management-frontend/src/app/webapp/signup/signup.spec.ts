import { ComponentFixture, TestBed } from '@angular/core/testing';

// Make sure the file './signup.ts' exists and exports the Signup class as shown below:
// export class Signup { ... }
// Update the path below to the correct location of your Signup component
import { Signup } from './signup.component'; // or correct the path as needed

describe('Signup', () => {
  let component: Signup;
  let fixture: ComponentFixture<Signup>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [Signup]
    })
    .compileComponents();

    fixture = TestBed.createComponent(Signup);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
